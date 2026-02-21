<?php

namespace App\Security;

use App\Entity\User;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\RateLimiter\RateLimiterFactory;

class GoogleAuthenticator extends AbstractAuthenticator
{
    public function __construct(
        private readonly ClientRegistry $clientRegistry,
        private readonly EntityManagerInterface $em,
        private readonly RouterInterface $router,
        private readonly SystemLoggerService $logger,
        private readonly RateLimiterFactory $googleOauthCheckLimiter,
    ) {}

    public function supports(Request $request): bool
    {
        return $request->attributes->get('_route') === 'oauth_google_check';
    }

    public function authenticate(Request $request): Passport
    {
        // ✅ Rate limit par IP sur le callback
        $ip = (string) ($request->getClientIp() ?? '0.0.0.0');
        $limit = $this->googleOauthCheckLimiter->create($ip)->consume(1);

        if (!$limit->isAccepted()) {
            throw new CustomUserMessageAuthenticationException('Trop de tentatives. Réessayez plus tard.');
        }

        try {
            $client = $this->clientRegistry->getClient('google');
            $accessToken = $client->getAccessToken();

            /** @var GoogleUser $googleUser */
            $googleUser = $client->fetchUserFromToken($accessToken);

            // ✅ Email obligatoire
            $rawEmail = (string) $googleUser->getEmail();
            $email = strtolower(trim($rawEmail));

            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->logger->add('Erreur Connexion', sprintf('OAuth Google: email manquant/invalide (IP: %s)', $ip));
                throw new CustomUserMessageAuthenticationException('Connexion Google impossible.');
            }

            $firstName = (string) ($googleUser->getFirstName() ?? '');
            $lastName  = (string) ($googleUser->getLastName() ?? '');

            return new SelfValidatingPassport(
                new UserBadge($email, function () use ($email, $firstName, $lastName, $ip): User {
                    /** @var \App\Repository\UserRepository $repo */
                    $repo = $this->em->getRepository(User::class);

                    // ✅ recherche insensible à la casse
                    $user = $repo->createQueryBuilder('u')
                        ->where('LOWER(u.email) = :email')
                        ->setParameter('email', $email)
                        ->getQuery()
                        ->getOneOrNullResult();

                    // ==========================
                    // ✅ USER EXISTANT
                    // ==========================
                    if ($user instanceof User) {
                        // complète seulement si vide
                        if (!$user->getFirstName() && $firstName) $user->setFirstName($firstName);
                        if (!$user->getLastName() && $lastName)  $user->setLastName($lastName);

                        // Si Google OK → on peut valider le compte
                        if (!$user->isVerified()) {
                            $user->setIsVerified(true);
                        }

                        /**
                         * ✅ IMPORTANT :
                         * - si le compte vient d'une inscription EMAIL (password != null),
                         *   il ne doit JAMAIS rester avec needsPassword = true.
                         * - si le compte vient de Google et n'a pas encore de password, needsPassword reste true.
                         */
                        if ($user->getPassword() !== null) {
                            $user->setNeedsPassword(false);
                        }

                        $this->em->flush();

                        $this->logger->add(
                            'Connexion',
                            sprintf('OAuth Google OK (user existant): %s (IP: %s)', $email, $ip)
                        );

                        return $user;
                    }

                    // ==========================
                    // ✅ NOUVEL USER VIA GOOGLE
                    // ==========================
                    $user = new User();
                    $user->setEmail($email);
                    $user->setFirstName($firstName ?: null);
                    $user->setLastName($lastName ?: null);
                    $user->setRoles(['ROLE_USER']);
                    $user->setIsVerified(true);

                    // ✅ LE FIX : pas de password tant qu'il ne l'a pas choisi
                    $user->setPassword(null);

                    // ✅ Ce flag déclenche ton setPasswordModal (uniquement Google)
                    $user->setNeedsPassword(true);

                    $this->em->persist($user);
                    $this->em->flush();

                    $this->logger->add('Inscription', sprintf('Nouvel utilisateur via Google : %s (IP: %s)', $email, $ip));

                    return $user;
                })
            );
        } catch (CustomUserMessageAuthenticationException $e) {
            // message déjà safe
            throw $e;
        } catch (\Throwable $e) {
            $this->logger->add('Erreur Connexion', 'OAuth Google: exception: ' . $e->getMessage());
            throw new CustomUserMessageAuthenticationException('Connexion Google impossible.');
        }
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?RedirectResponse
    {
        $user = $token->getUser();
        if (!$user instanceof User) {
            return new RedirectResponse($this->router->generate('home'));
        }

        $this->logger->add('Connexion', sprintf('Connexion Google OK : %s', $user->getEmail()));

        $redirect = in_array('ROLE_ADMIN', $user->getRoles(), true)
            ? $this->router->generate('admin_dashboard')
            : $this->router->generate('home');

        return new RedirectResponse($redirect);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?RedirectResponse
    {
        $this->logger->add('Erreur Connexion', 'Échec connexion Google');
        return new RedirectResponse($this->router->generate('app_login'));
    }
}
