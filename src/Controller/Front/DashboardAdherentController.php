<?php

namespace App\Controller\Front;

use App\Entity\User;
use App\Entity\Licence;
use App\Entity\ContactMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DashboardAdherentController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/dashboard', name: 'dashboard')]
    #[Route('/espace-adherent', name: 'adherent_dashboard', methods: ['GET'])]
    public function index(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // 1. Planning (Données statiques du club)
        $planning = [
            ['day' => 'Lundi', 'hours' => '17h00 - 20h00', 'type' => 'Haltérophilie'],
            ['day' => 'Mercredi', 'hours' => '14h00 - 16h00', 'type' => 'École d\'haltéro'],
            ['day' => 'Mercredi', 'hours' => '18h00 - 20h00', 'type' => 'Musculation'],
            ['day' => 'Vendredi', 'hours' => '18h00 - 21h00', 'type' => 'Force Athlétique'],
        ];

        // 2. Historique des messages de l'adhérent
        $messages = $this->em->getRepository(ContactMessage::class)->findBy(
            ['user' => $user],
            ['createdAt' => 'DESC']
        );

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
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
       🔷 4) Sécurité & Compte
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
       🔷 5) Paramètres du compte (Email, Tel, A2F)
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

        return $this->json([
            'success' => true,
            'message' => 'La configuration de la double authentification sera bientôt disponible.'
        ]);
    }
}
