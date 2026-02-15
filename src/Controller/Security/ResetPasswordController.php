<?php

namespace App\Controller\Security;

use App\Entity\User;
use App\Entity\PasswordHistory;
use App\Repository\PasswordHistoryRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class ResetPasswordController extends AbstractController
{
    #[Route('/reset-password', name: 'app_reset_password_request', methods: ['POST'])]
    public function request(
        Request $request,
        EntityManagerInterface $em,
        MailerInterface $mailer,
        SystemLoggerService $logger,
        Environment $twig
    ): Response {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'] ?? null;

        if (!$email) {
            return $this->json(['success' => false, 'message' => '⚠️ Email manquant.'], 400);
        }

        $user = $em->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($user) {
            $now = new \DateTimeImmutable();
            $lastRequest = $user->getLastResetRequestAt();

            if ($lastRequest && $lastRequest > $now->modify('-60 seconds')) {
                return $this->json(['success' => false, 'message' => 'Veuillez patienter avant une nouvelle demande.'], 429);
            }

            $token = Uuid::v4()->toRfc4122();
            $user->setResetToken($token);
            $user->setResetTokenExpiresAt($now->modify('+1 hour'));
            $user->setLastResetRequestAt($now);
            $em->flush();

            $logger->add('Sécurité', sprintf('Demande de réinitialisation mot de passe pour %s (IP: %s)', $email, $request->getClientIp()));

            $resetUrl = $this->generateUrl('app_reset_password', ['token' => $token], 0);

            $htmlContent = $twig->render('emails/reset_password.html.twig', [
                'user' => $user,
                'resetUrl' => $resetUrl
            ]);

            $emailMessage = (new Email())
                ->from('enzodheilly134@gmail.com')
                ->to($user->getEmail())
                ->subject('Réinitialisation de votre mot de passe')
                ->html($htmlContent);

            $mailer->send($emailMessage);
        }

        return $this->json(['success' => true, 'message' => 'Un mail vous a été envoyé pour réinitialiser votre mot de passe.']);
    }

    #[Route('/reset-password/{token}', name: 'app_reset_password', methods: ['GET'])]
    public function redirectToModal(string $token): Response
    {
        return $this->redirect('/?resetToken=' . urlencode($token));
    }

    #[Route('/api/reset-password-final', name: 'app_reset_password_final', methods: ['POST'])]
    public function resetPasswordFinal(
        Request $request,
        EntityManagerInterface $em,
        SystemLoggerService $logger,
        PasswordHasherFactoryInterface $passwordHasherFactory
    ): Response {
        $data = json_decode($request->getContent(), true);
        $token = $data['token'] ?? null;
        $newPassword = $data['password'] ?? null;

        if (!$token || !$newPassword) {
            return $this->json(['success' => false, 'message' => 'Paramètres manquants.'], 400);
        }

        $user = $em->getRepository(User::class)->findOneBy(['resetToken' => $token]);
        if (!$user || $user->getResetTokenExpiresAt() < new \DateTimeImmutable()) {
            return $this->json(['success' => false, 'message' => 'Lien invalide ou expiré.'], 400);
        }

        // --- 🛡️ SÉCURITÉ : Vérification Historique ---
        $hasher = $passwordHasherFactory->getPasswordHasher($user);

        // 1. Vérif mot de passe actuel (même si on le change, on évite de remettre le même)
        if ($user->getPassword() && $hasher->verify($user->getPassword(), $newPassword)) {
            return $this->json(['success' => false, 'message' => 'Vous ne pouvez pas réutiliser votre mot de passe actuel.'], 400);
        }

        // 2. Vérif des 5 derniers mots de passe
        // On utilise findBy standard pour être sûr que ça marche
        $lastPasswords = $em->getRepository(PasswordHistory::class)->findBy(
            ['user' => $user],
            ['changedAt' => 'DESC'],
            5
        );

        foreach ($lastPasswords as $history) {
            if ($hasher->verify($history->getPasswordHash(), $newPassword)) {
                return $this->json(['success' => false, 'message' => 'Ce mot de passe a déjà été utilisé récemment.'], 400);
            }
        }

        // --- ✅ SAUVEGARDE ---

        // 1. Archiver l'ancien (s'il existe)
        if ($user->getPassword()) {
            $oldHistory = new PasswordHistory();
            $oldHistory->setUser($user);
            $oldHistory->setPasswordHash($user->getPassword());
            $em->persist($oldHistory);
        }

        // 2. Mettre le nouveau
        $newHash = $hasher->hash($newPassword);
        $user->setPassword($newHash);

        // Nettoyage token
        $user->setResetToken(null);
        $user->setResetTokenExpiresAt(null);
        $user->setLastResetRequestAt(null);

        $em->flush();

        // Optionnel : Nettoyage vieux historique ici si tu as la méthode
        // $passwordHistoryRepo->pruneOldPasswords($user); 

        $logger->add('Sécurité', sprintf('Le mot de passe de %s a été réinitialisé avec succès.', $user->getEmail()));

        return $this->json(['success' => true]);
    }
}
