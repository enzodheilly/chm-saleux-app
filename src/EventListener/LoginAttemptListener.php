<?php

namespace App\EventListener;

use App\Entity\SecurityLog;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\Event\LoginFailureEvent;

class LoginAttemptListener
{
    public function __construct(
        private readonly RequestStack $requestStack,
        private readonly EntityManagerInterface $em,
        private readonly UserRepository $userRepository,
        private readonly TokenStorageInterface $tokenStorage
    ) {}

    /**
     * 🔍 Détecte le système et le navigateur depuis le User-Agent
     */
    private function parseUserAgent(string $userAgent): array
    {
        $os = 'Inconnu';
        $browser = 'Inconnu';

        // --- OS detection ---
        if (preg_match('/Windows NT 11\.0/i', $userAgent)) $os = 'Windows 11';
        elseif (preg_match('/Windows NT 10\.0/i', $userAgent)) $os = 'Windows 10';
        elseif (preg_match('/Mac OS X ([\d_]+)/i', $userAgent, $m)) $os = 'macOS ' . str_replace('_', '.', $m[1]);
        elseif (preg_match('/Android ([\d.]+)/i', $userAgent, $m)) $os = 'Android ' . $m[1];
        elseif (preg_match('/iPhone OS ([\d_]+)/i', $userAgent, $m)) $os = 'iOS ' . str_replace('_', '.', $m[1]);
        elseif (preg_match('/Linux/i', $userAgent)) $os = 'Linux';

        // --- Browser detection ---
        if (preg_match('/Edg\/([\d.]+)/i', $userAgent, $m)) $browser = 'Edge ' . $m[1];
        elseif (preg_match('/Chrome\/([\d.]+)/i', $userAgent, $m)) $browser = 'Chrome ' . $m[1];
        elseif (preg_match('/Firefox\/([\d.]+)/i', $userAgent, $m)) $browser = 'Firefox ' . $m[1];
        elseif (preg_match('/Safari\/([\d.]+)/i', $userAgent, $m) && !preg_match('/Chrome/i', $userAgent)) $browser = 'Safari ' . $m[1];
        elseif (preg_match('/OPR\/([\d.]+)/i', $userAgent, $m)) $browser = 'Opera ' . $m[1];

        return ['os' => $os, 'browser' => $browser];
    }

    /**
     * 🔴 Échec de connexion (log uniquement)
     * ✅ Symfony moderne : LoginFailureEvent
     */
    public function onLoginFailure(LoginFailureEvent $event): void
    {
        $request = $event->getRequest();

        $ip = $request->getClientIp() ?? '0.0.0.0';
        $userAgent = (string) $request->headers->get('User-Agent', '');
        $ua = $this->parseUserAgent($userAgent);

        // Email soumis au formulaire (plus fiable que token sur failure)
        $submittedEmail = strtolower(trim((string) $request->request->get('email', '')));

        $log = new SecurityLog();
        $log->setIp($ip);
        $log->setUserAgent($userAgent);
        $log->setOs($ua['os']);
        $log->setBrowser($ua['browser']);
        $log->setSuccess(false);
        $log->setType('Connexion');
        $log->setCreatedAt(new \DateTimeImmutable());

        // Message (évite le "event unused" + utile en debug)
        $log->setMessage('Échec de connexion');

        if ($submittedEmail !== '') {
            $log->setEmailAttempt($submittedEmail);
            $user = $this->userRepository->findOneBy(['email' => $submittedEmail]);
            if ($user) {
                $log->setUser($user);
            }
        }

        $this->em->persist($log);
        $this->em->flush();
    }

    /**
     * 🟢 Connexion réussie (log + empreinte session)
     */
    public function onInteractiveLogin(InteractiveLoginEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();
        if (!$request) {
            return;
        }

        $ip = $request->getClientIp() ?? '0.0.0.0';
        $userAgent = (string) $request->headers->get('User-Agent', '');
        $ua = $this->parseUserAgent($userAgent);

        $user = $event->getAuthenticationToken()->getUser();
        if (!$user instanceof User) {
            return;
        }

        $log = new SecurityLog();
        $log->setIp($ip);
        $log->setUserAgent($userAgent);
        $log->setOs($ua['os']);
        $log->setBrowser($ua['browser']);
        $log->setSuccess(true);
        $log->setUser($user);
        $log->setEmailAttempt($user->getEmail());
        $log->setType('Connexion');
        $log->setMessage('Connexion réussie');
        $log->setCreatedAt(new \DateTimeImmutable());

        $this->em->persist($log);

        // ✅ Empreinte session
        if ($request->hasSession()) {
            $session = $request->getSession();
            $session->set('login_ip', $ip);
            $session->set('login_agent', substr($userAgent, 0, 180));
            $session->set('session_context_last_log_at', time());
        }

        $this->em->flush();
    }

    /**
     * 👁️ Détection de changement de contexte
     * - Anti-flood (1 log max / 15 min)
     * - Log seulement si l'agent change (plus fiable que l'IP)
     */
    public function checkSessionContext(): void
    {
        $token = $this->tokenStorage->getToken();
        $user = $token ? $token->getUser() : null;
        if (!$user instanceof User) {
            return;
        }

        $request = $this->requestStack->getCurrentRequest();
        if (!$request || !$request->hasSession()) {
            return;
        }

        $session = $request->getSession();
        if (!$session->has('login_agent')) {
            return;
        }

        $now = time();
        $last = (int) $session->get('session_context_last_log_at', 0);
        if ($last > 0 && ($now - $last) < (15 * 60)) {
            return;
        }

        $currentIp = (string) ($request->getClientIp() ?? '');
        $currentAgent = substr((string) $request->headers->get('User-Agent', ''), 0, 180);

        $initialIp = (string) $session->get('login_ip', '');
        $initialAgent = (string) $session->get('login_agent', '');

        $agentChanged = $currentAgent !== $initialAgent;
        $ipChanged = $currentIp !== $initialIp;

        if ($agentChanged) {
            $log = new SecurityLog();
            $log->setIp($currentIp !== '' ? $currentIp : '0.0.0.0');
            $log->setUser($user);
            $log->setSuccess(true);
            $log->setType('Session');
            $log->setMessage(sprintf(
                'Session suspecte : changement appareil/navigateur. IP %s → %s',
                $initialIp !== '' ? $initialIp : 'n/a',
                $currentIp !== '' ? $currentIp : 'n/a'
            ));
            $log->setCreatedAt(new \DateTimeImmutable());

            $this->em->persist($log);
            $this->em->flush();

            $session->set('session_context_last_log_at', $now);
            $session->set('login_agent', $currentAgent);
            $session->set('login_ip', $currentIp);
        } elseif ($ipChanged) {
            // IP seule change souvent (mobile/Wi-Fi), update silencieux
            $session->set('login_ip', $currentIp);
        }
    }
}
