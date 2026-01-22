<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\CustomCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class GoogleAuthenticator extends AbstractAuthenticator
{
    private ClientRegistry $clientRegistry;
    private EntityManagerInterface $em;
    private RouterInterface $router;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(
        ClientRegistry $clientRegistry,
        EntityManagerInterface $em,
        RouterInterface $router,
        UserPasswordHasherInterface $passwordHasher
    ) {
        $this->clientRegistry = $clientRegistry;
        $this->em = $em;
        $this->router = $router;
        $this->passwordHasher = $passwordHasher;
    }

    public function supports(Request $request): bool
    {
        return $request->attributes->get('_route') === 'oauth_google_check';
    }

    public function authenticate(Request $request): Passport
    {
        $client = $this->clientRegistry->getClient('google');
        $accessToken = $client->getAccessToken();
        /** @var GoogleUser $googleUser */
        $googleUser = $client->fetchUserFromToken($accessToken);

        // 🔹 Normalisation email
        $email = strtolower(trim($googleUser->getEmail()));
        $firstName = $googleUser->getFirstName() ?? '';
        $lastName = $googleUser->getLastName() ?? '';

        return new Passport(
            new UserBadge($email, function ($userIdentifier) use ($email, $firstName, $lastName) {
                // 🔹 Recherche insensible à la casse
                $user = $this->em->getRepository(User::class)
                    ->createQueryBuilder('u')
                    ->where('LOWER(u.email) = :email')
                    ->setParameter('email', $email)
                    ->getQuery()
                    ->getOneOrNullResult();

                if ($user) {
                    // 🔹 Complète prénom/nom si vide
                    if (empty($user->getFirstName()) && $firstName) {
                        $user->setFirstName($firstName);
                    }
                    if (empty($user->getLastName()) && $lastName) {
                        $user->setLastName($lastName);
                    }
                    $this->em->flush();
                    return $user;
                }

                // 🔹 Aucun utilisateur trouvé → création
                $user = new User();
                $user->setEmail($email);
                $user->setFirstName($firstName);
                $user->setLastName($lastName);

                $tempPassword = bin2hex(random_bytes(10));
                $user->setPassword($this->passwordHasher->hashPassword($user, $tempPassword));
                $user->setNeedsPassword(true);

                $this->em->persist($user);
                $this->em->flush();

                return $user;
            }),
            new CustomCredentials(fn() => true, $email)
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?RedirectResponse
    {
        return new RedirectResponse($this->router->generate('home'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?RedirectResponse
    {
        return new RedirectResponse($this->router->generate('app_login'));
    }
}
