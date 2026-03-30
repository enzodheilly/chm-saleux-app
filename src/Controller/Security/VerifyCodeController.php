<?php

namespace App\Controller\Security;

use App\Authenticator\LoginFormAuthenticator;
use App\Repository\UserRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class VerifyCodeController extends AbstractController
{
    #[Route('/verify/code', name: 'app_verify_code', methods: ['GET', 'POST'])]
    public function verifyCode(
        Request $request,
        SessionInterface $session,
        UserRepository $userRepository,
        EntityManagerInterface $em,
        SystemLoggerService $logger,
        RateLimiterFactory $verify_codeLimiter,
        UserAuthenticatorInterface $userAuthenticator,
        LoginFormAuthenticator $authenticator
    ): Response {
        $ip = (string) $request->getClientIp();

        // Email uniquement depuis la session, jamais depuis l'URL
        $email = $session->get('verify_email', '');

        if ($request->isMethod('GET')) {
            if (!$email) {
                return $this->redirectToRoute('app_register');
            }
            return $this->render('security/verify_code.html.twig');
        }

        // --- LOGIQUE POST ---
        $csrf = (string) $request->request->get('_token', '');
        if (!$this->isCsrfTokenValid('verify_code', $csrf)) {
            $this->addFlash('error', 'Session invalide.');
            return $this->redirectToRoute('app_verify_code');
        }

        $code = trim((string) $request->request->get('code', ''));

        // Rate Limit
        $limit = $verify_codeLimiter->create($ip . '|' . ($email ?: 'no-email'))->consume(1);
        if (!$limit->isAccepted()) {
            $this->addFlash('error', 'Trop de tentatives. Réessayez plus tard.');
            return $this->redirectToRoute('app_verify_code');
        }

        if ($email === '') {
            return $this->redirectToRoute('app_register');
        }

        $user = $userRepository->findOneBy(['email' => $email]);
        if (!$user) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('app_register');
        }

        // Vérification du code
        $expiresAt = $user->getVerificationCodeExpiresAt();
        if (!$expiresAt || $expiresAt < new \DateTimeImmutable()) {
            $this->addFlash('error', 'Le code a expiré.');
            return $this->redirectToRoute('app_verify_code');
        }

        if ((string) $user->getVerificationCode() !== $code) {
            $this->addFlash('error', 'Code incorrect.');
            return $this->redirectToRoute('app_verify_code');
        }

        // Succès
        $user->setIsVerified(true);
        $user->setVerificationCode(null);
        $user->setVerificationCodeExpiresAt(null);
        $em->flush();

        $session->remove('verify_email');
        $this->addFlash('success', 'Votre compte est validé !');

        return $userAuthenticator->authenticateUser($user, $authenticator, $request);
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
    ): Response {
        // Email uniquement depuis la session
        $email = $session->get('verify_email', '');

        if (!$this->isCsrfTokenValid('resend_code', (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Session invalide.');
            return $this->redirectToRoute('app_verify_code');
        }

        if ($email === '') {
            return $this->redirectToRoute('app_register');
        }

        // Rate limit anti-spam
        $ip = (string) $request->getClientIp();
        $logger->add('Debug rate limit', 'IP: ' . $ip . ' | Email: ' . $email);
        $limit = $resend_codeLimiter->create($ip . '|' . $email)->consume(1);
        if (!$limit->isAccepted()) {
            $retryAfter = $limit->getRetryAfter()->getTimestamp() - time();
            $minutes = ceil($retryAfter / 60);
            $this->addFlash('error', sprintf(
                'Trop de tentatives. Réessayez dans %d minute%s.',
                $minutes,
                $minutes > 1 ? 's' : ''
            ));
            return $this->redirectToRoute('app_verify_code');
        }

        $user = $userRepository->findOneBy(['email' => $email]);
        if (!$user) {
            return $this->redirectToRoute('app_register');
        }

        // Génération nouveau code
        $newCode = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->setVerificationCode($newCode);
        $user->setVerificationCodeExpiresAt(new \DateTimeImmutable('+15 minutes'));
        $em->flush();

        try {
            $emailMessage = (new Email())
                ->from('no-reply@chm-saleux.fr')
                ->to($user->getEmail())
                ->subject('Votre nouveau code de vérification - CHM Saleux')
                ->html("<p>Bonjour {$user->getFirstName()}, voici votre nouveau code : <strong>{$newCode}</strong> (valable 15 minutes)</p>");

            $mailer->send($emailMessage);
            $this->addFlash('success', 'Un nouveau code a été envoyé.');
        } catch (\Throwable $e) {
            $logger->add('Erreur renvoi code', $e->getMessage());
            $this->addFlash('error', "Erreur lors de l'envoi de l'email.");
        }

        return $this->redirectToRoute('app_verify_code');
    }
}
