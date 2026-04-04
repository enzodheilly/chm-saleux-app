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

                    $user = $repo->createQueryBuilder('u')
                        ->where('LOWER(u.email) = :email')
                        ->setParameter('email', $email)
                        ->getQuery()
                        ->getOneOrNullResult();

                    $pseudo = $this->logger->pseudonymizeEmail($email);

                    if ($user instanceof User) {
                        if (!$user->getFirstName() && $firstName) $user->setFirstName($firstName);
                        if (!$user->getLastName() && $lastName)  $user->setLastName($lastName);

                        if (!$user->isVerified()) {
                            $user->setIsVerified(true);
                        }

                        if ($user->getPassword() !== null) {
                            $user->setNeedsPassword(false);
                        }

                        $this->em->flush();

                        $this->logger->add(
                            'Connexion',
                            sprintf('OAuth Google OK (user existant): %s (IP: %s)', $pseudo, $ip)
                        );

                        return $user;
                    }

                    $user = new User();
                    $user->setEmail($email);
                    $user->setFirstName($firstName ?: null);
                    $user->setLastName($lastName ?: null);
                    $user->setRoles(['ROLE_USER']);
                    $user->setIsVerified(true);
                    $user->setPassword(null);
                    $user->setNeedsPassword(true);

                    $this->em->persist($user);
                    $this->em->flush();

                    $this->logger->add('Inscription', sprintf('Nouvel utilisateur via Google : %s (IP: %s)', $pseudo, $ip));

                    return $user;
                })
            );
        } catch (CustomUserMessageAuthenticationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            $this->logger->add('Erreur Connexion', 'OAuth Google: exception: ' . $e->getMessage());
            throw new CustomUserMessageAuthenticationException('Connexion Google impossible.');
        }
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?RedirectResponse
    {
        /** @var User $user */
        $user = $token->getUser();

        if (!$user instanceof User) {
            return new RedirectResponse($this->router->generate('home'));
        }

        $pseudo = $this->logger->pseudonymizeEmail($user->getEmail());
        $this->logger->add('Connexion', sprintf('Connexion Google OK : %s', $pseudo));

        if ($user->getNeedsPassword()) {
            return new RedirectResponse($this->router->generate('set_password'));
        }

        if (in_array('ROLE_ADMIN', $user->getRoles(), true)) {
            return new RedirectResponse($this->router->generate('admin_dashboard'));
        }

        return new RedirectResponse($this->router->generate('home'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?RedirectResponse
    {
        $this->logger->add('Erreur Connexion', 'Échec connexion Google');
        return new RedirectResponse($this->router->generate('app_login'));
    }
}
