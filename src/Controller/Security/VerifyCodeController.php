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

class VerifyCodeController extends AbstractController
{
    #[Route('/verification/email', name: 'app_verify_code', methods: ['GET', 'POST'])]
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
            $logger->add(SystemLoggerService::TYPE_SECURITE, 'Code de vérification expiré pour : ' . $email, $email, false);
            $this->addFlash('error', 'Le code a expiré.');
            return $this->redirectToRoute('app_verify_code');
        }

        if ((string) $user->getVerificationCode() !== $code) {
            $logger->add(SystemLoggerService::TYPE_SECURITE, 'Code de vérification incorrect pour : ' . $email, $email, false);
            $this->addFlash('error', 'Code incorrect.');
            return $this->redirectToRoute('app_verify_code');
        }

        // Succès
        $user->setIsVerified(true);
        $user->setVerificationCode(null);
        $user->setVerificationCodeExpiresAt(null);
        $em->flush();

        $logger->add(SystemLoggerService::TYPE_SECURITE, 'Compte vérifié par email : ' . $email, $email);
        $session->remove('verify_email');
        $this->addFlash('success', 'Votre compte est validé !');

        return $userAuthenticator->authenticateUser($user, $authenticator, $request);
    }

    #[Route('/verification/email/renvoyer', name: 'app_resend_code', methods: ['POST'])]
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
                ->html($this->renderView('emails/verify_code.html.twig', [
                    'firstName' => $user->getFirstName(),
                    'code'      => $newCode,
                ]));
            $mailer->send($emailMessage);
            $this->addFlash('success', 'Un nouveau code a été envoyé.');
        } catch (\Throwable $e) {
            $logger->add(SystemLoggerService::TYPE_SECURITE, 'Erreur envoi code vérification : ' . $e->getMessage(), $email, false);
            $this->addFlash('error', "Erreur lors de l'envoi de l'email.");
        }

        return $this->redirectToRoute('app_verify_code');
    }
}
