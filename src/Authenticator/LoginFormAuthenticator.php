<?php

namespace App\Authenticator;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\SystemLoggerService;
use App\Service\TurnstileVerifierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\PasswordUpgradeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\RateLimiter\RateLimiterFactory;

class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    public function __construct(
        private readonly RouterInterface $router,
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $em,
        private readonly SystemLoggerService $logger,
        private readonly TurnstileVerifierService $turnstileVerifier,
        private readonly RateLimiterFactory $loginLimiter,
    ) {}

    public function supports(Request $request): bool
    {
        return $request->attributes->get('_route') === 'app_login'
            && $request->isMethod('POST');
    }

    public function authenticate(Request $request): Passport
    {
        $ip = (string) $request->getClientIp();

        // ✅ Rate limit IP
        $limit = $this->loginLimiter->create($ip)->consume(1);
        if (!$limit->isAccepted()) {
            throw new CustomUserMessageAuthenticationException('Trop de tentatives. Réessayez plus tard.');
        }

        // ✅ Turnstile obligatoire
        $turnstileToken = (string) $request->request->get('cf-turnstile-response', '');
        if (!$this->turnstileVerifier->verify($turnstileToken, $ip)) {
            // message neutre
            throw new CustomUserMessageAuthenticationException('Impossible de vous connecter.');
        }

        $email = strtolower(trim((string) $request->request->get('email', '')));
        $password = (string) $request->request->get('password', '');

        // utile pour afficher le dernier email tapé
        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email, function (string $userIdentifier): User {
                $user = $this->userRepository->findOneBy(['email' => $userIdentifier]);

                // ✅ message neutre (anti enumeration)
                if (!$user) {
                    throw new CustomUserMessageAuthenticationException('Adresse e-mail ou mot de passe incorrect.');
                }

                // 🔒 Compte verrouillé ?
                $lockedUntil = $user->getLockedUntil();
                if ($lockedUntil && $lockedUntil > new \DateTimeImmutable()) {
                    $remaining = $lockedUntil->getTimestamp() - time();
                    $minutes = max(1, (int) ceil($remaining / 60));
                    throw new CustomUserMessageAuthenticationException(
                        sprintf('Compte temporairement bloqué (%d min restantes).', $minutes)
                    );
                }

                /**
                 * ✅ IMPORTANT
                 * On NE bloque PAS "non vérifié" ici.
                 * Sinon: même avec mauvais mdp => tu pars sur verify.
                 * Le blocage se fait après auth via UserChecker (checkPostAuth).
                 */
                return $user;
            }),
            new PasswordCredentials($password),
            [
                new CsrfTokenBadge('authenticate', (string) $request->request->get('_csrf_token')),
                new RememberMeBadge(),
                new PasswordUpgradeBadge($password, $this->userRepository),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): Response
    {
        /** @var User $user */
        $user = $token->getUser();
        $ip = (string) $request->getClientIp();

        // ✅ reset compteurs
        $user->setFailedAttempts(0);
        $user->setLockedUntil(null);
        $user->setLastLoginAt(new \DateTimeImmutable());
        $user->setLastLoginIp($ip);
        $this->em->flush();

        $this->logger->add('Connexion', sprintf('Utilisateur %s connecté (IP: %s)', $user->getEmail(), $ip));

        $redirectUrl = in_array('ROLE_ADMIN', $user->getRoles(), true)
            ? $this->router->generate('admin_dashboard')
            : $this->router->generate('home');

        return new JsonResponse([
            'success' => true,
            'message' => 'Connexion réussie',
            'redirect' => $redirectUrl,
        ]);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        $email = strtolower(trim((string) $request->request->get('email', '')));
        $ip = (string) $request->getClientIp();

        $user = $email !== '' ? $this->userRepository->findOneBy(['email' => $email]) : null;

        /**
         * ✅ Cas: UserChecker a bloqué le compte (ex: non vérifié)
         * => Ici on renvoie un JSON exploitable pour ouvrir l'étape verify.
         */
        if ($exception instanceof CustomUserMessageAccountStatusException) {
            $msg = $exception->getMessageKey();

            $this->logger->add('Sécurité', sprintf(
                'Login refusé (status) pour %s (IP: %s) - %s',
                $email ?: 'n/a',
                $ip,
                $msg
            ));

            // si ton UserChecker renvoie le message "Veuillez vérifier..."
            return new JsonResponse([
                'success' => false,
                'code' => 'NOT_VERIFIED',
                'message' => 'Compte non vérifié. Entrez le code reçu par e-mail ou renvoyez un nouveau code.',
                'email' => $email,
            ], 403);
        }

        $msg = $exception instanceof CustomUserMessageAuthenticationException
            ? $exception->getMessageKey()
            : 'Identifiants incorrects.';

        // ✅ Lockout uniquement si user existe ET mauvais identifiants
        if ($user && ($msg === 'Identifiants incorrects.' || $msg === 'Adresse e-mail ou mot de passe incorrect.')) {
            $failed = ($user->getFailedAttempts() ?? 0) + 1;
            $user->setFailedAttempts($failed);

            if ($failed >= 5) {
                $user->setLockedUntil(new \DateTimeImmutable('+3 minutes'));
                $this->logger->add('Sécurité', sprintf(
                    'Compte %s verrouillé (5 échecs). (IP: %s)',
                    $user->getEmail(),
                    $ip
                ));
            }

            $this->em->flush();
        }

        $this->logger->add('Échec Connexion', sprintf(
            'Pour: %s (IP: %s) - Raison: %s',
            $email ?: 'Inconnu',
            $ip,
            $msg
        ));

        return new JsonResponse([
            'success' => false,
            'message' => $msg,
        ], 401);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->router->generate('app_login');
    }
}
