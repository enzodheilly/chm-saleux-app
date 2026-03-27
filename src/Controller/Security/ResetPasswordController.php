<?php

namespace App\Controller\Security;

use App\Entity\PasswordHistory;
use App\Entity\User;
use App\Service\SystemLoggerService;
use App\Service\TurnstileVerifierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Uid\Uuid;

class ResetPasswordController extends AbstractController
{
    private function isStrongPassword(string $password): bool
    {
        if (mb_strlen($password) < 12) return false;
        if (!preg_match('/[A-Z]/', $password)) return false;
        if (!preg_match('/[a-z]/', $password)) return false;
        if (!preg_match('/\d/', $password)) return false;
        if (!preg_match('/[^A-Za-z0-9]/', $password)) return false;
        return true;
    }

    /**
     * ÉTAPE 1 : Demande de réinitialisation (Saisie de l'email)
     */
    #[Route('/reset-password', name: 'app_reset_password_request', methods: ['GET', 'POST'])]
    public function request(
        Request $request,
        EntityManagerInterface $em,
        MailerInterface $mailer,
        SystemLoggerService $logger,
        TurnstileVerifierService $turnstile,
        RateLimiterFactory $reset_requestLimiter
    ): Response {
        if ($request->isMethod('GET')) {
            return $this->render('security/reset_password_request.html.twig');
        }

        $ip = (string) $request->getClientIp();
        $email = strtolower(trim((string)$request->request->get('email', '')));

        // ✅ Validation CSRF & Turnstile
        if (
            !$this->isCsrfTokenValid('reset_request', (string)$request->request->get('_token')) ||
            !$turnstile->verify((string)$request->request->get('cf-turnstile-response', ''), $ip)
        ) {
            $this->addFlash('error', 'Validation de sécurité échouée.');
            return $this->redirectToRoute('app_reset_password_request');
        }

        // ✅ Rate limit
        $limit = $reset_requestLimiter->create($ip)->consume(1);
        if (!$limit->isAccepted()) {
            $this->addFlash('error', 'Trop de demandes. Réessayez plus tard.');
            return $this->redirectToRoute('app_reset_password_request');
        }

        /** @var User|null $user */
        $user = $em->getRepository(User::class)->findOneBy(['email' => $email]);

        if ($user) {
            $now = new \DateTimeImmutable();

            // Cooldown de 60s entre deux demandes
            if ($user->getLastResetRequestAt() && $user->getLastResetRequestAt() > $now->modify('-60 seconds')) {
                $this->addFlash('error', 'Veuillez patienter avant une nouvelle demande.');
                return $this->redirectToRoute('app_reset_password_request');
            }

            $resetToken = Uuid::v4()->toRfc4122();
            $user->setResetToken($resetToken);
            $user->setResetTokenExpiresAt((new \DateTimeImmutable())->modify('+1 hour'));
            $user->setLastResetRequestAt(new \DateTimeImmutable());
            $em->flush();

            $logger->add('Sécurité', "Demande reset MDP pour $email (IP: $ip)");

            // URL absolue pour l'email
            $resetUrl = $this->generateUrl(
                'app_reset_password_confirm',
                ['token' => $resetToken],
                UrlGeneratorInterface::ABSOLUTE_URL
            );

            // Envoi de l'email
            try {
                $emailMessage = (new Email())
                    ->from('no-reply@chm-saleux.fr')
                    ->to($user->getEmail())
                    ->subject('Réinitialisation de votre mot de passe')
                    ->html($this->renderView('emails/reset_password.html.twig', [
                        'user' => $user,
                        'resetUrl' => $resetUrl,
                    ]));
                $mailer->send($emailMessage);
            } catch (\Throwable $e) {
                $logger->add('Erreur email reset', $e->getMessage());
            }
        }

        // Réponse neutre pour éviter l'énumération d'emails
        $this->addFlash('success', 'Si un compte existe, un email a été envoyé pour réinitialiser le mot de passe.');
        return $this->redirectToRoute('app_login');
    }

    /**
     * ÉTAPE 2 : Saisie du nouveau mot de passe (via le lien de l'email)
     */
    #[Route('/reset-password/confirm/{token}', name: 'app_reset_password_confirm', methods: ['GET', 'POST'])]
    public function reset(
        string $token,
        Request $request,
        EntityManagerInterface $em,
        PasswordHasherFactoryInterface $passwordHasherFactory,
        SystemLoggerService $logger
    ): Response {
        /** @var User|null $user */
        $user = $em->getRepository(User::class)->findOneBy(['resetToken' => $token]);

        if (!$user || !$user->getResetTokenExpiresAt() || $user->getResetTokenExpiresAt() < new \DateTimeImmutable()) {
            $this->addFlash('error', 'Le lien est invalide ou a expiré.');
            return $this->redirectToRoute('app_login');
        }

        if ($request->isMethod('GET')) {
            return $this->render('security/reset_password_confirm.html.twig', ['token' => $token]);
        }

        // --- LOGIQUE POST ---
        if (!$this->isCsrfTokenValid('reset_final', (string)$request->request->get('_token'))) {
            $this->addFlash('error', 'Session invalide.');
            return $this->redirectToRoute('app_reset_password_confirm', ['token' => $token]);
        }

        $newPassword = (string)$request->request->get('password');
        $confirmPassword = (string)$request->request->get('confirm_password');

        if ($newPassword !== $confirmPassword) {
            $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
            return $this->redirectToRoute('app_reset_password_confirm', ['token' => $token]);
        }

        if (!$this->isStrongPassword($newPassword)) {
            $this->addFlash('error', 'Le mot de passe est trop faible.');
            return $this->redirectToRoute('app_reset_password_confirm', ['token' => $token]);
        }

        $hasher = $passwordHasherFactory->getPasswordHasher($user);

        // Vérification de l'historique (les 5 derniers)
        $lastPasswords = $em->getRepository(PasswordHistory::class)->findBy(['user' => $user], ['changedAt' => 'DESC'], 5);
        foreach ($lastPasswords as $history) {
            if ($hasher->verify($history->getPasswordHash(), $newPassword)) {
                $this->addFlash('error', 'Vous avez déjà utilisé ce mot de passe récemment.');
                return $this->redirectToRoute('app_reset_password_confirm', ['token' => $token]);
            }
        }

        // Archive l'ancien mdp
        if ($user->getPassword()) {
            $oldHistory = new PasswordHistory();
            $oldHistory->setUser($user);
            $oldHistory->setPasswordHash($user->getPassword());
            $em->persist($oldHistory);
        }

        // Mise à jour du nouveau MDP
        $user->setPassword($hasher->hash($newPassword));
        $user->setResetToken(null);
        $user->setResetTokenExpiresAt(null);
        $user->setLastResetRequestAt(null);
        $em->flush();

        $logger->add('Sécurité', "Mot de passe réinitialisé pour {$user->getEmail()}");

        $this->addFlash('success', 'Votre mot de passe a été modifié. Vous pouvez maintenant vous connecter.');
        return $this->redirectToRoute('app_login');
    }
}
