<?php

namespace App\Controller\Front;

use App\Entity\ContactMessage;
use App\Entity\Licence;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\MemberProgressService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAdherentController extends AbstractController
{
    private EntityManagerInterface $em;
    private MemberProgressService $memberProgressService;

    public function __construct(
        EntityManagerInterface $em,
        MemberProgressService $memberProgressService
    ) {
        $this->em = $em;
        $this->memberProgressService = $memberProgressService;
    }

    #[Route('/dashboard', name: 'dashboard')]
    #[Route('/espace-adherent', name: 'adherent_dashboard', methods: ['GET'])]
    public function index(Request $request): Response
    {
        /** @var User|null $user */
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        $rangeDays = (int) $request->query->get('range', 30);
        if (!in_array($rangeDays, [0, 7, 30, 90], true)) {
            $rangeDays = 30;
        }

        $planning = [
            ['day' => 'Lundi', 'hours' => '17h00 - 20h00', 'type' => 'Haltérophilie'],
            ['day' => 'Mercredi', 'hours' => '14h00 - 16h00', 'type' => 'École d\'haltéro'],
            ['day' => 'Mercredi', 'hours' => '18h00 - 20h00', 'type' => 'Musculation'],
            ['day' => 'Vendredi', 'hours' => '18h00 - 21h00', 'type' => 'Force Athlétique'],
        ];

        $messages = $this->em->getRepository(ContactMessage::class)->findBy(
            ['user' => $user],
            ['createdAt' => 'DESC']
        );

        $mobileProgress = $this->memberProgressService->getDashboardPayload($user, $rangeDays);

        $currentLicence = $this->getCurrentLicenceForUser($user);

        $adminInfo = [
            'feesStatus' => $currentLicence ? 'À jour' : '—',
            'feesDue' => $currentLicence?->getExpiryDate()?->format('d/m/Y') ?? '—',
            'medicalStatus' => $currentLicence ? 'Valide' : '—',
            'medicalExpiry' => $currentLicence?->getExpiryDate()?->format('d/m/Y') ?? '—',
        ];

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
            'planning' => $planning,
            'messages' => $messages,
            'mobileProgress' => $mobileProgress,
            'adminInfo' => $adminInfo,
            'notifications' => [],
            'currentLicence' => $currentLicence,
        ]);
    }

    private function getCurrentLicenceForUser(User $user): ?Licence
    {
        /** @var Licence[] $licences */
        $licences = $this->em->getRepository(Licence::class)->findBy(
            ['user' => $user],
            ['expiryDate' => 'DESC']
        );

        if (!$licences) {
            return null;
        }

        $now = new \DateTimeImmutable();

        // On privilégie une licence encore valide
        foreach ($licences as $licence) {
            $expiryDate = $licence->getExpiryDate();

            if ($expiryDate instanceof \DateTimeInterface && $expiryDate >= $now) {
                return $licence;
            }
        }

        // Sinon on prend la plus récente
        return $licences[0];
    }

    /* ============================================================
       🔷 2) Gestion de la Licence
       ============================================================ */

    #[Route('/espace-adherent/licence', name: 'adherent_edit_license', methods: ['POST'])]
    public function editLicense(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false], 401);
        }

        $licenceNumber = trim((string) $request->request->get('licenceNumber', ''));
        $licence = $this->em->getRepository(Licence::class)->findOneBy(['number' => $licenceNumber]);

        if (!$licence) {
            return $this->json([
                'success' => false,
                'message' => 'Numéro de licence invalide',
            ]);
        }

        if ($licence->isAlreadyAssociated()) {
            return $this->json([
                'success' => false,
                'message' => 'Licence déjà associée à un compte',
            ]);
        }

        $licence->setUser($user);
        $this->em->flush();

        return $this->json([
            'success' => true,
            'message' => 'Licence synchronisée ✅',
        ]);
    }

    #[Route('/espace-adherent/licence/remove', name: 'adherent_remove_license', methods: ['POST'])]
    public function removeLicense(): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false], 401);
        }

        $licence = $this->getCurrentLicenceForUser($user);

        if (!$licence) {
            return $this->json([
                'success' => false,
                'message' => 'Aucune licence associée trouvée.',
            ]);
        }

        $licence->setUser(null);
        $this->em->flush();

        return $this->json([
            'success' => true,
            'message' => 'Licence retirée ✅',
        ]);
    }

    /* ============================================================
       🔷 3) Profil & Photo
       ============================================================ */

    #[Route('/profil/photo', name: 'profile_photo', methods: ['POST'])]
    public function uploadProfilePhoto(Request $request): JsonResponse
    {
        $user = $this->getUser();
        $file = $request->files->get('profileImage');

        if (!$user instanceof User || !$file) {
            return $this->json(['success' => false], 400);
        }

        $binary = file_get_contents($file->getPathname());
        $mime = $file->getMimeType();

        $user->setProfileImage($binary);
        $user->setProfileImageMime($mime);
        $user->setProfileImageUpdatedAt(new \DateTimeImmutable());

        $this->em->flush();

        return $this->json([
            'success' => true,
            'imageDataUrl' => sprintf('data:%s;base64,%s', $mime, base64_encode($binary)),
        ]);
    }

    /* ============================================================
       🔷 4) Sécurité & Compte
       ============================================================ */

    #[Route('/compte/change-password', name: 'change_password', methods: ['POST'])]
    public function changePassword(
        Request $request,
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false], 401);
        }

        $currentPassword = (string) $request->request->get('current_password');
        $newPassword = (string) $request->request->get('new_password');

        if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
            return $this->json([
                'success' => false,
                'message' => 'Mot de passe actuel incorrect.',
            ]);
        }

        $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
        $this->em->flush();

        return $this->json([
            'success' => true,
            'message' => 'Mot de passe modifié avec succès !',
        ]);
    }

    #[Route('/profile/delete-account', name: 'profile_delete_account', methods: ['POST'])]
    public function deleteAccount(
        Security $security,
        SessionInterface $session,
        UserPasswordHasherInterface $passwordHasher,
        Request $request
    ): JsonResponse {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->json([
                'success' => false,
                'message' => 'Utilisateur non connecté.',
            ], 401);
        }

        $data = json_decode($request->getContent(), true) ?? [];

        if (!$passwordHasher->isPasswordValid($user, $data['password'] ?? '')) {
            return $this->json([
                'success' => false,
                'message' => 'Mot de passe incorrect.',
            ]);
        }

        $security->logout(false);
        $session->invalidate();

        $this->em->remove($user);
        $this->em->flush();

        return $this->json(['success' => true]);
    }

    /* ============================================================
       🔷 5) Paramètres du compte
       ============================================================ */

    #[Route('/espace-adherent/settings/update-email', name: 'adherent_settings_update_email', methods: ['POST'])]
    public function updateEmail(
        Request $request,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse {
        /** @var User|null $user */
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->json([
                'success' => false,
                'message' => 'Utilisateur non connecté.',
            ], 401);
        }

        $data = json_decode($request->getContent(), true) ?? [];

        if (!$this->isCsrfTokenValid('update_email', $data['_token'] ?? '')) {
            return $this->json([
                'success' => false,
                'message' => 'Jeton CSRF invalide.',
            ], 400);
        }

        $newEmail = trim((string) ($data['email'] ?? ''));
        $currentPassword = (string) ($data['currentPassword'] ?? '');

        if (!$newEmail || !filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            return $this->json([
                'success' => false,
                'message' => 'Veuillez renseigner une adresse e-mail valide.',
            ], 400);
        }

        if (!$currentPassword) {
            return $this->json([
                'success' => false,
                'message' => 'Le mot de passe actuel est requis.',
            ], 400);
        }

        if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
            return $this->json([
                'success' => false,
                'message' => 'Le mot de passe actuel est incorrect.',
            ], 400);
        }

        $existingUser = $userRepository->findOneBy(['email' => $newEmail]);
        if ($existingUser && $existingUser !== $user) {
            return $this->json([
                'success' => false,
                'message' => 'Cette adresse e-mail est déjà utilisée.',
            ], 400);
        }

        $user->setEmail($newEmail);
        $this->em->flush();

        return $this->json([
            'success' => true,
            'message' => 'Votre e-mail a bien été mis à jour.',
            'email' => $newEmail,
        ]);
    }

    #[Route('/espace-adherent/settings/update-password', name: 'adherent_settings_update_password', methods: ['POST'])]
    public function updatePassword(
        Request $request,
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse {
        /** @var User|null $user */
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->json([
                'success' => false,
                'message' => 'Utilisateur non connecté.',
            ], 401);
        }

        $data = json_decode($request->getContent(), true) ?? [];

        if (!$this->isCsrfTokenValid('update_password', $data['_token'] ?? '')) {
            return $this->json([
                'success' => false,
                'message' => 'Jeton CSRF invalide.',
            ], 400);
        }

        $currentPassword = (string) ($data['currentPassword'] ?? '');
        $newPassword = (string) ($data['newPassword'] ?? '');
        $confirmPassword = (string) ($data['confirmPassword'] ?? '');

        if (!$currentPassword || !$newPassword || !$confirmPassword) {
            return $this->json([
                'success' => false,
                'message' => 'Veuillez remplir tous les champs.',
            ], 400);
        }

        if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
            return $this->json([
                'success' => false,
                'message' => 'Le mot de passe actuel est incorrect.',
            ], 400);
        }

        if (mb_strlen($newPassword) < 8) {
            return $this->json([
                'success' => false,
                'message' => 'Le nouveau mot de passe doit contenir au moins 8 caractères.',
            ], 400);
        }

        if ($newPassword !== $confirmPassword) {
            return $this->json([
                'success' => false,
                'message' => 'La confirmation du nouveau mot de passe ne correspond pas.',
            ], 400);
        }

        if ($passwordHasher->isPasswordValid($user, $newPassword)) {
            return $this->json([
                'success' => false,
                'message' => 'Le nouveau mot de passe doit être différent de l’ancien.',
            ], 400);
        }

        $user->setPassword($passwordHasher->hashPassword($user, $newPassword));
        $this->em->flush();

        return $this->json([
            'success' => true,
            'message' => 'Votre mot de passe a bien été mis à jour.',
        ]);
    }

    /* ============================================================
       🔷 6) Anciennes routes API (optionnel, à garder si utilisées)
       ============================================================ */

    #[Route('/api/user/update-settings', name: 'api_user_update_settings', methods: ['POST'])]
    public function updateSettings(
        Request $request,
        UserPasswordHasherInterface $hasher
    ): JsonResponse {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->json([
                'success' => false,
                'message' => 'Utilisateur non trouvé',
            ], 401);
        }

        $data = json_decode($request->getContent(), true) ?? [];
        $type = $data['type'] ?? null;

        if ($type === 'email') {
            $newEmail = trim((string) ($data['value'] ?? ''));

            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                return $this->json([
                    'success' => false,
                    'message' => 'Format d\'email invalide',
                ]);
            }

            $existing = $this->em->getRepository(User::class)->findOneBy(['email' => $newEmail]);
            if ($existing && $existing !== $user) {
                return $this->json([
                    'success' => false,
                    'message' => 'Cet email est déjà utilisé',
                ]);
            }

            $user->setEmail($newEmail);
        } elseif ($type === 'password') {
            $oldPass = (string) ($data['old'] ?? '');
            $newPass = (string) ($data['new'] ?? '');

            if (!$hasher->isPasswordValid($user, $oldPass)) {
                return $this->json([
                    'success' => false,
                    'message' => 'Ancien mot de passe incorrect',
                ]);
            }

            if (strlen($newPass) < 8) {
                return $this->json([
                    'success' => false,
                    'message' => 'Le nouveau mot de passe doit faire au moins 8 caractères',
                ]);
            }

            $user->setPassword($hasher->hashPassword($user, $newPass));
        } else {
            return $this->json([
                'success' => false,
                'message' => 'Type de mise à jour invalide',
            ], 400);
        }

        try {
            $this->em->flush();

            return $this->json([
                'success' => true,
                'message' => 'Mise à jour réussie !',
            ]);
        } catch (\Exception) {
            return $this->json([
                'success' => false,
                'message' => 'Erreur lors de la sauvegarde',
            ], 500);
        }
    }

    #[Route('/api/user/toggle-2fa', name: 'api_user_toggle_2fa', methods: ['POST'])]
    public function toggle2FA(): JsonResponse
    {
        /** @var User|null $user */
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->json([
                'success' => false,
                'message' => 'Utilisateur non trouvé',
            ], 401);
        }

        return $this->json([
            'success' => true,
            'message' => 'La configuration de la double authentification sera bientôt disponible.',
        ]);
    }
}
