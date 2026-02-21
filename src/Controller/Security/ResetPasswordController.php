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
use Twig\Environment;

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

    #[Route('/reset-password', name: 'app_reset_password_request', methods: ['POST'])]
    public function request(
        Request $request,
        EntityManagerInterface $em,
        MailerInterface $mailer,
        SystemLoggerService $logger,
        Environment $twig,
        TurnstileVerifierService $turnstile,
        RateLimiterFactory $reset_requestLimiter
    ): Response {
        // ✅ CSRF
        $csrf = (string) $request->request->get('_token', '');
        if (!$this->isCsrfTokenValid('reset_request', $csrf)) {
            return $this->json(['success' => false, 'message' => 'Session invalide.'], 400);
        }

        $ip = (string) $request->getClientIp();

        // ✅ Rate limit IP (anti-spam)
        $limit = $reset_requestLimiter->create($ip)->consume(1);
        if (!$limit->isAccepted()) {
            return $this->json(['success' => false, 'message' => 'Trop de demandes. Réessayez plus tard.'], 429);
        }

        // ✅ Turnstile (recommandé sur reset)
        // (Ton Twig doit inclure le widget Turnstile sur l’étape reset email)
        $turnstileToken = (string) $request->request->get('cf-turnstile-response', '');
        if (!$turnstile->verify($turnstileToken, $ip)) {
            // ✅ réponse neutre anti-enumération
            return $this->json(['success' => true, 'message' => 'Si un compte existe, un email a été envoyé.']);
        }

        // ✅ support JSON + form-data
        $email = (string) $request->request->get('email', '');
        if ($email === '') {
            $data = json_decode((string) $request->getContent(), true);
            $email = (string)($data['email'] ?? '');
        }

        $email = strtolower(trim($email));
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // ✅ réponse neutre (anti enumeration)
            return $this->json(['success' => true, 'message' => 'Si un compte existe, un email a été envoyé.']);
        }

        /** @var User|null $user */
        $user = $em->getRepository(User::class)->findOneBy(['email' => $email]);

        if ($user) {
            $now = new \DateTimeImmutable();
            $lastRequest = $user->getLastResetRequestAt();

            // ✅ Cooldown (par compte)
            if ($lastRequest && $lastRequest > $now->modify('-60 seconds')) {
                return $this->json(['success' => false, 'message' => 'Veuillez patienter avant une nouvelle demande.'], 429);
            }

            $resetToken = Uuid::v4()->toRfc4122();
            $user->setResetToken($resetToken);
            $user->setResetTokenExpiresAt($now->modify('+1 hour'));
            $user->setLastResetRequestAt($now);
            $em->flush();

            $logger->add('Sécurité', sprintf(
                'Demande réinitialisation MDP pour %s (IP: %s)',
                $email,
                $ip
            ));

            // ✅ URL ABSOLUE
            $resetUrl = $this->generateUrl(
                'app_reset_password',
                ['token' => $resetToken],
                UrlGeneratorInterface::ABSOLUTE_URL
            );

            $htmlContent = $twig->render('emails/reset_password.html.twig', [
                'user' => $user,
                'resetUrl' => $resetUrl,
            ]);

            $emailMessage = (new Email())
                ->from('no-reply@monsite.com')
                ->to($user->getEmail())
                ->subject('Réinitialisation de votre mot de passe')
                ->html($htmlContent);

            try {
                $mailer->send($emailMessage);
            } catch (\Throwable $e) {
                $logger->add('Erreur reset mail', $e->getMessage());
                // ✅ réponse neutre quand même
            }
        }

        // ✅ réponse neutre
        return $this->json(['success' => true, 'message' => 'Si un compte existe, un email a été envoyé.']);
    }

    #[Route('/reset-password/{token}', name: 'app_reset_password', methods: ['GET'])]
    public function redirectToModal(string $token): Response
    {
        // OK: le token reste dans l’URL car c’est nécessaire pour l’UX actuelle
        return $this->redirect('/?resetToken=' . urlencode($token));
    }

    #[Route('/api/reset-password-final', name: 'app_reset_password_final', methods: ['POST'])]
    public function resetPasswordFinal(
        Request $request,
        EntityManagerInterface $em,
        SystemLoggerService $logger,
        PasswordHasherFactoryInterface $passwordHasherFactory,
        RateLimiterFactory $reset_finalLimiter
    ): Response {
        $ip = (string) $request->getClientIp();

        // ✅ Rate limit IP (anti brute force token)
        $limit = $reset_finalLimiter->create($ip)->consume(1);
        if (!$limit->isAccepted()) {
            return $this->json(['success' => false, 'message' => 'Trop de tentatives. Réessayez plus tard.'], 429);
        }

        // ✅ CSRF (form-data)
        $csrf = (string) $request->request->get('_token', '');

        // ✅ support JSON + form-data
        $token = (string) $request->request->get('token', '');
        $newPassword = (string) $request->request->get('newPassword', '');
        $confirmPassword = (string) $request->request->get('confirmPassword', '');

        if ($token === '' && $request->getContent()) {
            $data = json_decode((string) $request->getContent(), true);
            $csrf = (string)($data['_token'] ?? $csrf);
            $token = (string)($data['token'] ?? '');
            $newPassword = (string)($data['newPassword'] ?? ($data['password'] ?? ''));
            $confirmPassword = (string)($data['confirmPassword'] ?? '');
        }

        if (!$this->isCsrfTokenValid('reset_final', $csrf)) {
            return $this->json(['success' => false, 'message' => 'Session invalide.'], 400);
        }

        if ($token === '' || $newPassword === '' || $confirmPassword === '') {
            return $this->json(['success' => false, 'message' => 'Paramètres manquants.'], 400);
        }

        if ($newPassword !== $confirmPassword) {
            return $this->json(['success' => false, 'message' => 'Les mots de passe ne correspondent pas.'], 400);
        }

        if (!$this->isStrongPassword($newPassword)) {
            return $this->json(['success' => false, 'message' => 'Mot de passe trop faible (12+ caractères, maj, min, chiffre, spécial).'], 400);
        }

        /** @var User|null $user */
        $user = $em->getRepository(User::class)->findOneBy(['resetToken' => $token]);
        if (
            !$user ||
            !$user->getResetTokenExpiresAt() ||
            $user->getResetTokenExpiresAt() < new \DateTimeImmutable()
        ) {
            return $this->json(['success' => false, 'message' => 'Lien invalide ou expiré.'], 400);
        }

        $hasher = $passwordHasherFactory->getPasswordHasher($user);

        // ✅ éviter de remettre le même mot de passe actuel
        if ($user->getPassword() && $hasher->verify($user->getPassword(), $newPassword)) {
            return $this->json(['success' => false, 'message' => 'Vous ne pouvez pas réutiliser votre mot de passe actuel.'], 400);
        }

        // ✅ Vérifie les 5 derniers
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

        // ✅ Archive l'ancien
        if ($user->getPassword()) {
            $oldHistory = new PasswordHistory();
            $oldHistory->setUser($user);
            $oldHistory->setPasswordHash($user->getPassword());
            $em->persist($oldHistory);
        }

        // ✅ Nouveau hash
        $user->setPassword($hasher->hash($newPassword));

        // ✅ Nettoyage reset tokens
        $user->setResetToken(null);
        $user->setResetTokenExpiresAt(null);
        $user->setLastResetRequestAt(null);

        $em->flush();

        $logger->add('Sécurité', sprintf(
            'Mot de passe réinitialisé pour %s (IP: %s)',
            $user->getEmail(),
            $ip
        ));

        return $this->json(['success' => true]);
    }
}
