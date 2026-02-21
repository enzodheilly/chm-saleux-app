<?php

namespace App\Controller\Security;

use App\Authenticator\LoginFormAuthenticator;
use App\Repository\UserRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class VerifyCodeController extends AbstractController
{
    #[Route('/verify/code', name: 'app_verify_code', methods: ['POST'])]
    public function verifyCode(
        Request $request,
        SessionInterface $session,
        UserRepository $userRepository,
        EntityManagerInterface $em,
        SystemLoggerService $logger,
        RateLimiterFactory $verify_codeLimiter,
        UserAuthenticatorInterface $userAuthenticator,
        LoginFormAuthenticator $authenticator
    ): JsonResponse {
        $csrf = (string) $request->request->get('_token', '');
        if (!$this->isCsrfTokenValid('verify_code', $csrf)) {
            return $this->json(['success' => false, 'message' => 'Session invalide.'], 400);
        }

        $ip = (string) $request->getClientIp();
        $email = (string) $session->get('verify_email', '');
        $code  = trim((string) $request->request->get('code', ''));

        $limit = $verify_codeLimiter->create($ip . '|' . ($email ?: 'no-email'))->consume(1);
        if (!$limit->isAccepted()) {
            return $this->json(['success' => false, 'message' => 'Trop de tentatives. Réessayez plus tard.'], 429);
        }

        if ($email === '') {
            $logger->add('Erreur vérification', "Session vide (IP: $ip)");
            return $this->json(['success' => false, 'message' => 'Session introuvable. Veuillez vous réinscrire.'], 400);
        }

        if (!preg_match('/^\d{6}$/', $code)) {
            return $this->json(['success' => false, 'message' => 'Code invalide.'], 400);
        }

        $user = $userRepository->findOneBy(['email' => $email]);
        if (!$user) {
            $session->remove('verify_email');
            $logger->add('Erreur vérification', "User introuvable (email: $email, IP: $ip)");
            return $this->json(['success' => false, 'message' => 'Erreur de vérification.'], 400);
        }

        if ($user->isVerified()) {
            $session->remove('verify_email');

            // ✅ déjà vérifié : on peut aussi le connecter direct (optionnel)
            $userAuthenticator->authenticateUser($user, $authenticator, $request);

            return $this->json([
                'success' => true,
                'redirect' => $this->generateUrl('home'),
            ]);
        }

        $expiresAt = $user->getVerificationCodeExpiresAt();
        if (!$expiresAt || $expiresAt < new \DateTimeImmutable()) {
            return $this->json(['success' => false, 'message' => 'Le code a expiré.'], 400);
        }

        if ((string) $user->getVerificationCode() !== $code) {
            return $this->json(['success' => false, 'message' => 'Code incorrect.'], 400);
        }

        $user->setIsVerified(true);
        $user->setVerificationCode(null);
        $user->setVerificationCodeExpiresAt(null);
        $em->flush();

        $session->remove('verify_email');
        $logger->add('Compte vérifié', sprintf('%s vérifié (IP: %s)', $user->getEmail(), $ip));

        // ✅ AUTO-LOGIN
        $userAuthenticator->authenticateUser($user, $authenticator, $request);

        return $this->json([
            'success' => true,
            'redirect' => $this->generateUrl('home'),
        ]);
    }

    #[Route('/verify/code/resend', name: 'app_resend_code', methods: ['POST'])]
    public function resendCode(
        Request $request,
        SessionInterface $session,
        UserRepository $userRepository,
        EntityManagerInterface $em,
        MailerInterface $mailer,
        SystemLoggerService $logger,
        RateLimiterFactory $resend_codeLimiter
    ): JsonResponse {
        $csrf = (string) $request->request->get('_token', '');
        if (!$this->isCsrfTokenValid('resend_code', $csrf)) {
            return $this->json(['success' => false, 'message' => 'Session invalide.'], 400);
        }

        $ip = (string) $request->getClientIp();
        $email = (string) $session->get('verify_email', '');

        $limit = $resend_codeLimiter->create($ip . '|' . ($email ?: 'no-email'))->consume(1);
        if (!$limit->isAccepted()) {
            return $this->json(['success' => false, 'message' => 'Trop de demandes. Réessayez plus tard.'], 429);
        }

        if ($email === '') {
            return $this->json(['success' => false, 'message' => 'Session introuvable. Veuillez vous réinscrire.'], 400);
        }

        $user = $userRepository->findOneBy(['email' => $email]);
        if (!$user) {
            $session->remove('verify_email');
            return $this->json(['success' => false, 'message' => 'Erreur. Veuillez vous réinscrire.'], 400);
        }

        if ($user->isVerified()) {
            $session->remove('verify_email');
            return $this->json(['success' => false, 'message' => 'Ce compte est déjà vérifié.'], 400);
        }

        $now = new \DateTimeImmutable();
        $expiresAt = $user->getVerificationCodeExpiresAt();
        if ($expiresAt && $expiresAt > $now) {
            return $this->json(['success' => false, 'message' => 'Un code est déjà actif.'], 429);
        }

        $newCode = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->setVerificationCode($newCode);
        $user->setVerificationCodeExpiresAt($now->modify('+15 minutes'));
        $em->flush();

        try {
            $emailMessage = (new Email())
                ->from('no-reply@monsite.com')
                ->to($user->getEmail())
                ->subject('Nouveau code de vérification')
                ->html(sprintf(
                    "<p>Bonjour <strong>%s</strong>,</p>
                     <p>Voici votre code :</p>
                     <h2 style='font-size:24px; letter-spacing:4px; color:#005b94;'>%s</h2>
                     <p>Valable 15 minutes.</p>",
                    htmlspecialchars((string) $user->getFirstName(), ENT_QUOTES),
                    $newCode
                ));

            $mailer->send($emailMessage);
            $logger->add('Renvoi code', sprintf('Code renvoyé à %s (IP: %s)', $user->getEmail(), $ip));

            return $this->json(['success' => true, 'message' => 'Un nouveau code a été envoyé.']);
        } catch (\Throwable $e) {
            $logger->add('Erreur renvoi code', $e->getMessage());
            return $this->json(['success' => false, 'message' => 'Erreur lors de l’envoi.'], 500);
        }
    }
}
