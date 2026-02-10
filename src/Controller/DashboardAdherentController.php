<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Event;
use App\Entity\UserEvent;
use App\Entity\Licence;
use App\Entity\ContactMessage; // ✅ Correction de l'entité
use App\Service\EventMailer;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Uid\Uuid;

class DashboardAdherentController extends AbstractController
{
    private EntityManagerInterface $em;
    private CsrfTokenManagerInterface $csrf;
    private EventMailer $eventMailer;

    public function __construct(
        EntityManagerInterface $em,
        CsrfTokenManagerInterface $csrf,
        EventMailer $eventMailer
    ) {
        $this->em = $em;
        $this->csrf = $csrf;
        $this->eventMailer = $eventMailer;
    }

    /* ============================================================
       🔷 1) Dashboard Principal
       ============================================================ */
    #[Route('/dashboard', name: 'dashboard')]
    #[Route('/espace-adherent', name: 'adherent_dashboard', methods: ['GET'])]
    public function index(EventRepository $eventRepository): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // 1. Événements futurs
        $events = $eventRepository->createQueryBuilder('e')
            ->where('e.date >= :today')
            ->setParameter('today', new \DateTime())
            ->orderBy('e.date', 'ASC')
            ->getQuery()
            ->getResult();

        // 2. Produits de la boutique
        $produits = $this->em->getRepository(Produit::class)->findAll();

        // 3. Notifications (Inscriptions confirmées non lues)
        $notifications = $this->em->getRepository(UserEvent::class)->findBy([
            'user' => $user,
            'status' => 'confirmed',
            'seen' => false
        ]);

        // 4. Planning (Données statiques)
        $planning = [
            ['day' => 'Lundi', 'hours' => '17h00 - 20h00', 'type' => 'Haltérophilie'],
            ['day' => 'Mercredi', 'hours' => '14h00 - 16h00', 'type' => 'École d\'haltéro'],
            ['day' => 'Mercredi', 'hours' => '18h00 - 20h00', 'type' => 'Musculation'],
            ['day' => 'Vendredi', 'hours' => '18h00 - 21h00', 'type' => 'Force Athlétique'],
        ];

        // 5. Historique des messages (Correctif ContactMessage)
        $messages = [];
        try {
            if (class_exists(ContactMessage::class)) {
                $messages = $this->em->getRepository(ContactMessage::class)->findBy(
                    ['user' => $user],
                    ['createdAt' => 'DESC']
                );
            }
        } catch (\Exception $e) {
            $messages = []; // Évite le crash si la table n'existe pas
        }

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
            'events' => $events,
            'produits' => $produits,
            'notifications' => $notifications,
            'planning' => $planning,
            'messages' => $messages,
        ]);
    }

    /* ============================================================
       🔷 2) Gestion de la Licence
       ============================================================ */
    #[Route('/espace-adherent/licence', name: 'adherent_edit_license', methods: ['POST'])]
    public function editLicense(Request $request): Response
    {
        $user = $this->getUser();
        if (!$user instanceof User) return $this->json(['success' => false], 401);

        $licenceNumber = trim((string) $request->request->get('licenceNumber', ''));
        $licence = $this->em->getRepository(Licence::class)->findOneBy(['number' => $licenceNumber]);

        if (!$licence) return $this->json(['success' => false, 'message' => 'Numéro de licence invalide']);
        if ($licence->isAlreadyAssociated()) return $this->json(['success' => false, 'message' => "Licence déjà associée à un compte"]);

        $licence->setAlreadyAssociated(true);
        $user->setLicenceNumber($licence->getNumber());
        $user->setLicenceStatus('Active');
        $user->setLicenceEndDate($licence->getExpiryDate());

        $this->em->flush();

        return $this->json(['success' => true, 'message' => 'Licence synchronisée ✅']);
    }

    #[Route('/espace-adherent/licence/remove', name: 'adherent_remove_license', methods: ['POST'])]
    public function removeLicense(): Response
    {
        $user = $this->getUser();
        if (!$user instanceof User) return $this->json(['success' => false], 401);

        $licence = $this->em->getRepository(Licence::class)->findOneBy(['number' => $user->getLicenceNumber()]);
        if ($licence) $licence->setAlreadyAssociated(false);

        $user->setLicenceNumber(null);
        $user->setLicenceStatus(null);
        $user->setLicenceEndDate(null);
        $this->em->flush();

        return $this->json(['success' => true, 'message' => 'Licence retirée ✅']);
    }

    /* ============================================================
       🔷 3) Profil & Photo
       ============================================================ */
    #[Route('/profil/photo', name: 'profile_photo', methods: ['POST'])]
    public function uploadProfilePhoto(Request $request): Response
    {
        $user = $this->getUser();
        $file = $request->files->get('profileImage');

        if (!$user instanceof User || !$file) return $this->json(['success' => false], 400);

        $binary = file_get_contents($file->getPathname());
        $mime = $file->getMimeType();

        $user->setProfileImage($binary);
        $user->setProfileImageMime($mime);
        $user->setProfileImageUpdatedAt(new \DateTimeImmutable());
        $this->em->flush();

        return new JsonResponse([
            'success' => true,
            'imageDataUrl' => sprintf('data:%s;base64,%s', $mime, base64_encode($binary))
        ]);
    }

    /* ============================================================
       🔷 4) Événements
       ============================================================ */
    #[Route('/events/{id}/register', name: 'event_register', methods: ['POST'])]
    public function registerEvent(?Event $event): JsonResponse
    {
        $user = $this->getUser();
        if (!$user || !$event) return $this->json(['success' => false], 404);

        $existing = $this->em->getRepository(UserEvent::class)->findOneBy(['user' => $user, 'event' => $event]);
        if ($existing) return $this->json(['success' => false, 'message' => 'Déjà inscrit']);

        $userEvent = new UserEvent();
        $userEvent->setUser($user);
        $userEvent->setEvent($event);
        $userEvent->setStatus('pending');
        $token = Uuid::v4()->toRfc4122();
        $userEvent->setToken($token);

        $this->em->persist($userEvent);
        $this->em->flush();

        $this->eventMailer->sendPendingRegistrationEmail($user->getEmail(), $event, $token);

        return $this->json(['success' => true, 'message' => 'Inscription en attente, vérifiez vos emails ✅']);
    }

    #[Route('/events/{id}/unregister', name: 'event_unregister', methods: ['POST'])]
    public function unregisterEvent(?Event $event): JsonResponse
    {
        $user = $this->getUser();
        $userEvent = $this->em->getRepository(UserEvent::class)->findOneBy(['user' => $user, 'event' => $event]);

        if (!$userEvent) return $this->json(['success' => false, 'message' => 'Non inscrit']);

        $this->em->remove($userEvent);
        $this->em->flush();
        $this->eventMailer->sendUnregistrationEmail($user->getEmail(), $event);

        return $this->json(['success' => true, 'message' => 'Désinscription réussie']);
    }

    /* ============================================================
       🔷 5) Sécurité & Compte
       ============================================================ */
    #[Route('/compte/change-password', name: 'change_password', methods: ['POST'])]
    public function changePassword(Request $request, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) return $this->json(['success' => false], 401);

        $currentPassword = $request->request->get('current_password');
        $newPassword = $request->request->get('new_password');

        if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
            return $this->json(['success' => false, 'message' => 'Mot de passe actuel incorrect.']);
        }

        $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
        $this->em->flush();

        return $this->json(['success' => true, 'message' => 'Mot de passe modifié avec succès !']);
    }

    #[Route('/profile/delete-account', name: 'profile_delete_account', methods: ['POST'])]
    public function deleteAccount(Security $security, SessionInterface $session, UserPasswordHasherInterface $passwordHasher, Request $request)
    {
        $user = $this->getUser();
        $data = json_decode($request->getContent(), true);

        if (!$passwordHasher->isPasswordValid($user, $data['password'] ?? '')) {
            return $this->json(['success' => false, 'message' => 'Mot de passe incorrect.']);
        }

        $security->logout(false);
        $session->invalidate();
        $this->em->remove($user);
        $this->em->flush();

        return $this->json(['success' => true]);
    }

    /* ============================================================
       🔷 6) Paramètres du compte (Email, Tel, A2F)
       ============================================================ */

    #[Route('/api/user/update-settings', name: 'api_user_update_settings', methods: ['POST'])]
    public function updateSettings(Request $request, UserPasswordHasherInterface $hasher): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 401);
        }

        $data = json_decode($request->getContent(), true);
        $type = $data['type'] ?? null;

        if ($type === 'email') {
            $newEmail = $data['value'] ?? '';
            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                return $this->json(['success' => false, 'message' => 'Format d\'email invalide']);
            }
            // Vérifier si l'email existe déjà
            $existing = $this->em->getRepository(User::class)->findOneBy(['email' => $newEmail]);
            if ($existing && $existing !== $user) {
                return $this->json(['success' => false, 'message' => 'Cet email est déjà utilisé']);
            }
            $user->setEmail($newEmail);
        } elseif ($type === 'phone') {
            $newPhone = $data['value'] ?? '';
            // Nettoyage basique du numéro
            $newPhone = preg_replace('/[^0-9+]/', '', $newPhone);
            if (strlen($newPhone) < 10) {
                return $this->json(['success' => false, 'message' => 'Numéro de téléphone invalide']);
            }
            // Assure-toi que ton entité User a bien une propriété 'phone'
            if (method_exists($user, 'setPhone')) {
                $user->setPhone($newPhone);
            } else {
                return $this->json(['success' => false, 'message' => 'Propriété téléphone manquante dans l\'entité']);
            }
        } elseif ($type === 'password') {
            $oldPass = $data['old'] ?? '';
            $newPass = $data['new'] ?? '';

            if (!$hasher->isPasswordValid($user, $oldPass)) {
                return $this->json(['success' => false, 'message' => 'Ancien mot de passe incorrect']);
            }
            if (strlen($newPass) < 8) {
                return $this->json(['success' => false, 'message' => 'Le nouveau mot de passe doit faire au moins 8 caractères']);
            }

            $user->setPassword($hasher->hashPassword($user, $newPass));
        }

        try {
            $this->em->flush();
            return $this->json(['success' => true, 'message' => 'Mise à jour réussie !']);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Erreur lors de la sauvegarde']);
        }
    }

    #[Route('/api/user/toggle-2fa', name: 'api_user_toggle_2fa', methods: ['POST'])]
    public function toggle2FA(): JsonResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        // Logique simplifiée : Si tu n'as pas encore installé scheb/2fa-bundle,
        // on simule l'activation/désactivation.
        // À terme, ici tu généreras le QR Code.

        // Exemple si tu as un champ isGoogleAuthenticatorEnabled :
        // $user->setIsGoogleAuthenticatorEnabled(!$user->isGoogleAuthenticatorEnabled());
        // $this->em->flush();

        return $this->json([
            'success' => true,
            'message' => 'La configuration de la double authentification sera bientôt disponible.'
        ]);
    }
}
