<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Event;
use App\Entity\UserEvent;
use App\Service\EventMailer;
use App\Entity\Licence;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\EventRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
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
       🔷 1) Dashboard
       ============================================================ */
    #[Route('/dashboard', name: 'dashboard')]
    #[Route('/espace-adherent', name: 'adherent_dashboard', methods: ['GET'])]
    public function index(EventRepository $eventRepository): Response
    {
        $user = $this->getUser();

        $events = $eventRepository->findBy([], ['date' => 'ASC', 'startTime' => 'ASC']);
        $produits = $this->em->getRepository(Produit::class)->findAll();

        return $this->render('dashboard_test/index.html.twig', [
            'user' => $user,
            'events' => $events,
            'produits' => $produits,
            'notifications' => $notifications,
            'planning' => $planning,
        ]);
    }

    /* ============================================================
       🔷 2) Licence : Ajouter / Modifier
       ============================================================ */
    #[Route('/espace-adherent/licence', name: 'adherent_edit_license', methods: ['POST'])]
    public function editLicense(Request $request): Response
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non connecté.'], 401);
        }

        $licenceNumber = trim((string) $request->request->get('licenceNumber', ''));
        if ($licenceNumber === '') {
            return $this->json(['success' => false, 'message' => 'Veuillez entrer un numéro de licence.']);
        }

        $licence = $this->em->getRepository(Licence::class)
            ->findOneBy(['number' => $licenceNumber]);

        if (!$licence) {
            return $this->json(['success' => false, 'message' => 'Numéro de licence introuvable ❌']);
        }

        if ($licence->isAlreadyAssociated()) {
            return $this->json([
                'success' => false,
                'message' => "Ce numéro de licence est déjà associé à un autre compte ❌<br>
                Si vous pensez être victime d'une usurpation d'identité, <a href='/contact'>contactez-nous ici</a>."
            ]);
        }

        $licence->setAlreadyAssociated(true);

        $user->setLicenceNumber($licence->getNumber());
        $user->setLicenceStatus('Active');
        $user->setLicenceEndDate($licence->getExpiryDate());

        $this->em->flush();

        return $this->json([
            'success' => true,
            'message' => 'Licence ajoutée et synchronisée avec succès ✅',
            'licenceNumber' => $licence->getNumber(),
            'expiryDate' => $licence->getExpiryDate()->format('d/m/Y'),
            'status' => 'Active',
        ]);
    }

    /* ============================================================
       🔷 3) Licence : Supprimer
       ============================================================ */
    #[Route('/espace-adherent/licence/remove', name: 'adherent_remove_license', methods: ['POST'])]
    public function removeLicense(): Response
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non connecté.'], 401);
        }

        $licenceNumber = $user->getLicenceNumber();
        if (!$licenceNumber) {
            return $this->json(['success' => false, 'message' => 'Aucune licence à supprimer.']);
        }

        $licence = $this->em->getRepository(Licence::class)
            ->findOneBy(['number' => $licenceNumber]);

        if ($licence) {
            $licence->setAlreadyAssociated(false);
        }

        $user->setLicenceNumber(null);
        $user->setLicenceStatus(null);
        $user->setLicenceEndDate(null);

        $this->em->flush();

        return $this->json(['success' => true, 'message' => 'Licence retirée avec succès ✅']);
    }

    /* ============================================================
       🔷 4) Modifier les informations du compte
       ============================================================ */
    #[Route('/compte/modifier', name: 'account_edit')]
    public function edit(): Response
    {
        return $this->render('dashboard_adherent/edit.html.twig');
    }

    /* ============================================================
       🔷 5) Upload Photo Profil
       ============================================================ */
    #[Route('/profil/photo', name: 'profile_photo', methods: ['POST'])]
    public function uploadProfilePhoto(Request $request): Response
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return new JsonResponse(['success' => false, 'message' => 'Utilisateur non connecté'], 401);
        }

        $file = $request->files->get('profileImage');

        if (!$file) {
            return new JsonResponse(['success' => false, 'message' => 'Aucun fichier reçu']);
        }

        $allowedMime = ['image/jpeg', 'image/png'];
        if (!in_array($file->getMimeType(), $allowedMime)) {
            return new JsonResponse(['success' => false, 'message' => 'Format non supporté (JPEG ou PNG uniquement)']);
        }

        $binary = file_get_contents($file->getPathname());
        $mime = $file->getMimeType();

        $user->setProfileImage($binary);
        $user->setProfileImageMime($mime);
        $user->setProfileImageUpdatedAt(new \DateTimeImmutable());

        $this->em->flush();

        return new JsonResponse([
            'success' => true,
            'message' => 'Photo de profil mise à jour !',
            'imageDataUrl' => sprintf('data:%s;base64,%s', $mime, base64_encode($binary))
        ]);
    }

    /* ============================================================
       🔷 6) Inscription à un événement + envoi mail confirmation
       ============================================================ */
    #[Route('/events/{id}/register', name: 'event_register', methods: ['POST'])]
    public function registerEvent(?Event $event): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non connecté'], 401);
        }

        if (!$event) {
            return $this->json(['success' => false, 'message' => 'Événement introuvable'], 404);
        }

        // Vérifie si déjà pré-inscrit ou inscrit
        $existing = $this->em->getRepository(UserEvent::class)
            ->findOneBy(['user' => $user, 'event' => $event]);

        if ($existing) {
            return $this->json([
                'success' => false,
                'message' => 'Déjà en attente de confirmation ou déjà inscrit'
            ]);
        }

        // Création de la pré-inscription
        $userEvent = new UserEvent();
        $userEvent->setUser($user);
        $userEvent->setEvent($event);
        $userEvent->setStatus('pending'); // statut initial
        $token = Uuid::v4()->toRfc4122(); // token unique pour le mail
        $userEvent->setToken($token);

        $this->em->persist($userEvent);
        $this->em->flush();

        // Envoi du mail de confirmation avec le token
        $this->eventMailer->sendPendingRegistrationEmail($user->getEmail(), $event, $token);

        return $this->json([
            'success' => true,
            'message' => "Un email de confirmation vient de vous être envoyé pour l’événement « {$event->getTitle()} » ✅",
        ]);
    }

    /* ============================================================
       🔷 7) Confirmation de l’inscription via mail
       ============================================================ */
    #[Route('/events/confirm/{id}/{token}', name: 'event_confirm')]
    public function confirmEvent(Event $event, string $token): Response
    {
        $userEvent = $this->em->getRepository(UserEvent::class)
            ->findOneBy(['event' => $event, 'token' => $token]);

        if (!$userEvent || $userEvent->getStatus() !== 'pending') {
            return new Response("Lien invalide ou expiré.");
        }

        $userEvent->setStatus('confirmed');
        $this->em->flush();

        $user = $userEvent->getUser();

        // Message de confirmation
        $message = "Votre inscription à l'événement « {$event->getTitle()} » est confirmée ✅";

        return $this->render('emails/confirmation.html.twig', [
            'user' => $user,
            'message' => $message,
            'event' => $event,
        ]);
    }

    #[Route('/notifications/mark-seen', name: 'notifications_mark_seen', methods: ['POST'])]
    public function markNotificationsSeen(): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false], 401);
        }

        // Récupère toutes les notifications confirmées non vues
        $unseen = $this->em->getRepository(UserEvent::class)
            ->findBy(['user' => $user, 'status' => 'confirmed', 'seen' => false]);

        foreach ($unseen as $ue) {
            $ue->setSeen(true); // marque comme lu
        }

        $this->em->flush();

        return $this->json(['success' => true]);
    }


    /* ============================================================
       🔷 8) Désinscription + mail
       ============================================================ */
    #[Route('/events/{id}/unregister', name: 'event_unregister', methods: ['POST'])]
    public function unregisterEvent(?Event $event): JsonResponse
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non connecté'], 401);
        }

        if (!$event) {
            return $this->json(['success' => false, 'message' => 'Événement introuvable'], 404);
        }

        $userEvent = $this->em->getRepository(UserEvent::class)
            ->findOneBy(['user' => $user, 'event' => $event]);

        if (!$userEvent || $userEvent->getStatus() !== 'confirmed') {
            return $this->json(['success' => false, 'message' => 'Non inscrit']);
        }

        $this->em->remove($userEvent);
        $this->em->flush();

        // envoi du mail
        $this->eventMailer->sendUnregistrationEmail($user->getEmail(), $event);

        return $this->json(['success' => true, 'message' => 'Désinscription réussie']);
    }

    /* ============================================================
   🔷 9) Modifier le mot de passe
   ============================================================ */
    #[Route('/compte/change-password', name: 'change_password', methods: ['POST'])]
    public function changePassword(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->json([
                'success' => false,
                'message' => 'Utilisateur non connecté.'
            ]);
        }

        $currentPassword = $request->request->get('current_password');
        $newPassword = $request->request->get('new_password');
        $confirmPassword = $request->request->get('confirm_password');

        // Vérifications
        if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
            return $this->json([
                'success' => false,
                'message' => 'Mot de passe actuel incorrect.'
            ]);
        }

        if ($newPassword !== $confirmPassword) {
            return $this->json([
                'success' => false,
                'message' => 'Les nouveaux mots de passe ne correspondent pas.'
            ]);
        }

        // Vérification des critères
        if (strlen($newPassword) < 12) {
            return $this->json([
                'success' => false,
                'message' => 'Le mot de passe doit contenir au moins 12 caractères.'
            ]);
        }
        if (!preg_match('/[A-Z]/', $newPassword)) {
            return $this->json([
                'success' => false,
                'message' => 'Le mot de passe doit contenir au moins une majuscule.'
            ]);
        }
        if (!preg_match('/[a-z]/', $newPassword)) {
            return $this->json([
                'success' => false,
                'message' => 'Le mot de passe doit contenir au moins une minuscule.'
            ]);
        }
        if (!preg_match('/\d/', $newPassword)) {
            return $this->json([
                'success' => false,
                'message' => 'Le mot de passe doit contenir au moins un chiffre.'
            ]);
        }
        if (!preg_match('/[\W_]/', $newPassword)) {
            return $this->json([
                'success' => false,
                'message' => 'Le mot de passe doit contenir au moins un caractère spécial.'
            ]);
        }

        // Tout est bon → hash et sauvegarde
        $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
        $em->flush();

        return $this->json([
            'success' => true,
            'message' => 'Mot de passe modifié avec succès !'
        ]);
    }

    #[Route('/profile/update-phone', name: 'profile_update_phone', methods: ['POST'])]
    public function updatePhone(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non connecté.'], 401);
        }

        $data = json_decode($request->getContent(), true);
        $phone = trim($data['phone'] ?? '');
        if (!$phone) {
            return $this->json(['success' => false, 'message' => 'Numéro de téléphone requis.']);
        }

        // Optionnel: validation du format du téléphone
        if (!preg_match('/^\+?\d{10,15}$/', $phone)) {
            return $this->json(['success' => false, 'message' => 'Format de numéro invalide.']);
        }

        $user->setPhone($phone);
        $this->em->flush();

        return $this->json(['success' => true, 'message' => 'Numéro de téléphone mis à jour avec succès.']);
    }

    #[Route('/profile/send-email-code', name: 'profile_send_email_code', methods: ['POST'])]
    public function sendEmailCode(Request $request, MailerInterface $mailer, \Symfony\Component\HttpFoundation\Session\SessionInterface $session): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non connecté.'], 401);
        }

        $data = json_decode($request->getContent(), true);
        $email = trim($data['email'] ?? '');
        if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->json(['success' => false, 'message' => 'Email invalide.']);
        }

        // Génération du code à 6 chiffres
        $code = random_int(100000, 999999);

        // Stockage du code + email temporaire dans la session
        $session->set('email_change_code', [
            'email' => $email,
            'code' => $code,
            'expires_at' => time() + 600 // 10 min
        ]);

        // Envoi du mail avec le code via MailerInterface
        $emailMessage = (new Email())
            ->from('no-reply@tonsite.com')
            ->to($email)
            ->subject('Code de vérification pour votre email')
            ->text("Bonjour {$user->getFirstName()},\n\nVoici votre code de vérification à 6 chiffres pour confirmer votre nouvel email : {$code}\n\nCe code est valable 10 minutes.\n\nCordialement,\nLe club");

        $mailer->send($emailMessage);

        return $this->json(['success' => true, 'message' => 'Un code a été envoyé à votre nouvel email.']);
    }

    #[Route('/profile/verify-email-code', name: 'profile_verify_email_code', methods: ['POST'])]
    public function verifyEmailCode(Request $request, \Symfony\Component\HttpFoundation\Session\SessionInterface $session): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non connecté.'], 401);
        }

        $data = json_decode($request->getContent(), true);
        $email = trim($data['email'] ?? '');
        $code = trim($data['code'] ?? '');

        if (!$email || !$code) {
            return $this->json(['success' => false, 'message' => 'Email et code requis.']);
        }

        $stored = $session->get('email_change_code');
        if (!$stored || $stored['email'] !== $email || $stored['code'] != $code || $stored['expires_at'] < time()) {
            return $this->json(['success' => false, 'message' => 'Code invalide ou expiré.']);
        }

        // Tout est ok → mise à jour de l’email
        $user->setEmail($email);
        $this->em->flush();

        // Supprime la session
        $session->remove('email_change_code');

        return $this->json(['success' => true, 'message' => 'Email mis à jour avec succès.']);
    }

    #[Route('/profile/delete-account', name: 'profile_delete_account', methods: ['POST'])]
    public function deleteAccount(
        Security $security,
        SessionInterface $session,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher,
        Request $request
    ) {
        $user = $security->getUser();

        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non connecté.'], 401);
        }

        $data = json_decode($request->getContent(), true);
        $confirm = trim($data['confirm'] ?? '');
        $password = trim($data['password'] ?? '');

        if (strtolower($confirm) !== 'supprimer mon compte') {
            return $this->json(['success' => false, 'message' => 'Vous devez taper "supprimer mon compte" pour confirmer.']);
        }

        if (!$passwordHasher->isPasswordValid($user, $password)) {
            return $this->json(['success' => false, 'message' => 'Mot de passe incorrect.']);
        }

        // Déconnexion et suppression session
        $security->logout(false);
        $session->invalidate();

        // Suppression utilisateur
        $em->remove($user);
        $em->flush();

        return $this->json(['success' => true, 'message' => 'Compte supprimé avec succès.']);
    }

    /*#[Route('/test/mail-inscription', name: 'test_mail')]
    public function testMailInscription(MailerInterface $mailer): Response
    {
        // Fake user
        $fakeUser = new class {
            public function getFirstName(): string
            {
                return 'Enzo';
            }
        };

        // Fake event
        $fakeEvent = new class {
            public string $title = 'Cours collectif';
            public ?\DateTimeInterface $startAt;
            public ?\DateTimeInterface $endAt;
            public ?string $location = 'chm saleux';

            public function __construct()
            {
                $this->startAt = new \DateTime('+3 days 18:00');
                $this->endAt = new \DateTime('+3 days 19:00');
            }
        };

        // Confirmation URL factice
        $confirmUrl = 'https://chmsaleux.fr/event/confirm/fake_token';

        // Envoi du mail
        $email = (new TemplatedEmail())
            ->from('CHM Saleux <no-reply@chmsaleux.fr>')
            ->to('enzodheilly134@gmail.com')
            ->subject('📬 Test - Confirmation d\'inscription CHM Saleux')
            ->htmlTemplate('emails/event_pending.html.twig') // ← ton nouveau template !
            ->context([
                'app' => (object)['user' => $fakeUser],
                'event' => $fakeEvent, // utilisation du fake event
                'confirmUrl' => $confirmUrl
            ]);

        $mailer->send($email);

        return new Response('✅ Mail de test envoyé !');
    }*/

    /*#[Route('/test/mail-desinscription', name: 'test_mail_desinscription')]
    public function testMailDesinscription(MailerInterface $mailer): Response
    {
        // Fake user
        $fakeUser = new class {
            public function getFirstName(): string
            {
                return 'Enzo';
            }
            public function getEmail(): string
            {
                return 'enzodheilly134@gmail.com';
            }
        };

        // Fake event
        $fakeEvent = new class {
            public string $title = 'Cours collectif';
            public ?\DateTimeInterface $startAt;
            public ?\DateTimeInterface $endAt;
            public ?string $location = 'CHM Saleux';

            public function __construct()
            {
                $this->startAt = new \DateTime('+3 days 18:00');
                $this->endAt = new \DateTime('+3 days 19:00');
            }
        };

        // Envoi du mail de désinscription
        $email = (new TemplatedEmail())
            ->from('CHM Saleux <no-reply@chmsaleux.fr>')
            ->to($fakeUser->getEmail())
            ->subject('❌ Désinscription à un événement CHM Saleux')
            ->htmlTemplate('emails/event_unregistration.html.twig') // ← template de désinscription responsive
            ->context([
                'user' => $fakeUser,
                'event' => $fakeEvent,
            ]);

        $mailer->send($email);

        return new Response('✅ Mail de désinscription test envoyé !');
    }*/


    /* #[Route('/test/event-confirm', name: 'test_event_confirm')]
    public function testEventConfirm(): Response
    {
        $fakeUser = new class {
            public function getFirstName(): string
            {
                return 'Enzo';
            }
            public function getEmail(): string
            {
                return 'enzodheilly134@gmail.com';
            }
        };

        $fakeEvent = new class {
            public string $title = 'Cours collectif';
            public ?\DateTimeInterface $startAt;
            public ?\DateTimeInterface $endAt;
            public ?string $location = 'CHM Saleux';
            public function __construct()
            {
                $this->startAt = new \DateTime('+3 days 18:00');
                $this->endAt = new \DateTime('+3 days 19:00');
            }
        };

        $message = "Votre inscription à l'événement « {$fakeEvent->title} » est confirmée ✅";

        return $this->render('emails/confirmation.html.twig', [
            'user' => $fakeUser,
            'message' => $message,
            'event' => $fakeEvent,
        ]);
    }

    #[Route('/test/event-confirm-page', name: 'test_event_confirm_page')]
    public function testEventConfirmPage(): Response
    {
        $fakeUser = new class {
            public function getFirstName(): string
            {
                return 'Enzo';
            }
            public function getEmail(): string
            {
                return 'enzodheilly134@gmail.com';
            }
        };

        $fakeEvent = new class {
            public string $title = 'Cours collectif';
            public ?\DateTimeInterface $startAt;
            public ?\DateTimeInterface $endAt;
            public ?string $location = 'CHM Saleux';
            public function __construct()
            {
                $this->startAt = new \DateTime('+3 days 18:00');
                $this->endAt = new \DateTime('+3 days 19:00');
            }
        };

        $message = "Votre inscription à l'événement « {$fakeEvent->title} » est confirmée ✅";

        return $this->render('emails/confirmation.html.twig', [
            'user' => $fakeUser,
            'message' => $message,
            'event' => $fakeEvent,
        ]);
    }*/
}
