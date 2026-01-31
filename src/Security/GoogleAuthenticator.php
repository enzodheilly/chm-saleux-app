<?php

namespace App\Security;

use App\Entity\User;
use App\Service\SystemLoggerService; // ✅ Import du service
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
    private SystemLoggerService $logger; // ✅ Propriété

    public function __construct(
        ClientRegistry $clientRegistry,
        EntityManagerInterface $em,
        RouterInterface $router,
        UserPasswordHasherInterface $passwordHasher,
        SystemLoggerService $logger // ✅ Injection
    ) {
        $this->clientRegistry = $clientRegistry;
        $this->em = $em;
        $this->router = $router;
        $this->passwordHasher = $passwordHasher;
        $this->logger = $logger;
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

        $email = strtolower(trim($googleUser->getEmail()));
        $firstName = $googleUser->getFirstName() ?? '';
        $lastName = $googleUser->getLastName() ?? '';

        return new Passport(
            new UserBadge($email, function ($userIdentifier) use ($email, $firstName, $lastName) {
                $user = $this->em->getRepository(User::class)
                    ->createQueryBuilder('u')
                    ->where('LOWER(u.email) = :email')
                    ->setParameter('email', $email)
                    ->getQuery()
                    ->getOneOrNullResult();

                if ($user) {
                    if (empty($user->getFirstName()) && $firstName) {
                        $user->setFirstName($firstName);
                    }
                    if (empty($user->getLastName()) && $lastName) {
                        $user->setLastName($lastName);
                    }
                    $this->em->flush();
                    return $user;
                }

                // 🔹 Création nouvel utilisateur
                $user = new User();
                $user->setEmail($email);
                $user->setFirstName($firstName);
                $user->setLastName($lastName);
                $user->setIsVerified(true); // Google emails sont considérés vérifiés

                $tempPassword = bin2hex(random_bytes(10));
                $user->setPassword($this->passwordHasher->hashPassword($user, $tempPassword));
                $user->setNeedsPassword(true);

                $this->em->persist($user);
                $this->em->flush();

                // ✅ LOG : Inscription Google
                $this->logger->add('Inscription', "Nouvel utilisateur inscrit via Google : $email");

                return $user;
            }),
            new CustomCredentials(fn() => true, $email)
        );
    }
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?RedirectResponse
    {
        /** @var User $user */
        $user = $token->getUser();

        // Log de connexion
        $this->logger->add('Connexion', sprintf('Connexion via Google réussie pour %s', $user->getEmail()));

        // ⚡ REDIRECTION INTELLIGENTE
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            // Si c'est un Admin -> Direction la page secrète
            return new RedirectResponse($this->router->generate('admin_dashboard'));
        }

        // Si c'est un membre classique -> Direction l'accueil
        return new RedirectResponse($this->router->generate('home'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?RedirectResponse
    {
        // ✅ LOG : Echec Connexion Google
        $this->logger->add('Erreur Connexion', 'Échec connexion Google : ' . $exception->getMessage());

        return new RedirectResponse($this->router->generate('app_login'));
    }
}
