<?php

namespace App\Authenticator;

use App\Repository\UserRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException; // Important
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\PasswordUpgradeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    private RouterInterface $router;
    private UserPasswordHasherInterface $passwordHasher;
    private UserRepository $userRepository;
    private EntityManagerInterface $entityManager;
    private SystemLoggerService $logger;

    public function __construct(
        RouterInterface $router,
        UserPasswordHasherInterface $passwordHasher,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        SystemLoggerService $logger
    ) {
        $this->router = $router;
        $this->passwordHasher = $passwordHasher;
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function authenticate(Request $request): Passport
    {
        $email = trim($request->request->get('email', ''));
        $password = $request->request->get('password', '');
        $ip = $request->getClientIp();

        return new Passport(
            new UserBadge($email, function ($userIdentifier) use ($password, $ip) {
                $user = $this->userRepository->findOneBy(['email' => $userIdentifier]);

                // 1. Utilisateur inconnu
                if (!$user) {
                    // On lance juste l'erreur, le log se fera dans onAuthenticationFailure
                    throw new CustomUserMessageAuthenticationException('Adresse e-mail ou mot de passe incorrect.');
                }

                // 2. Compte verrouillé
                if ($user->getLockedUntil() && $user->getLockedUntil() > new \DateTimeImmutable()) {
                    $remaining = $user->getLockedUntil()->getTimestamp() - time();
                    $minutes = ceil($remaining / 60);
                    throw new CustomUserMessageAuthenticationException(
                        sprintf('Compte temporairement bloqué (%d min restantes).', $minutes)
                    );
                }

                // 3. Email non vérifié
                if (!$user->isVerified()) {
                    throw new CustomUserMessageAuthenticationException('Veuillez vérifier votre e-mail avant de vous connecter.');
                }

                // 4. Mot de passe incorrect
                if (!$this->passwordHasher->isPasswordValid($user, $password)) {
                    $failed = ($user->getFailedAttempts() ?? 0) + 1;
                    $user->setFailedAttempts($failed);

                    // Si on atteint 5 essais, on bloque
                    if ($failed >= 5) {
                        $user->setLockedUntil(new \DateTimeImmutable('+3 minutes'));
                        // Ici on peut logger le blocage spécifique car on modifie l'user
                        $this->logger->add('Sécurité', sprintf('Compte %s verrouillé (5 échecs).', $user->getEmail()));
                    }

                    $this->entityManager->flush();

                    throw new CustomUserMessageAuthenticationException('Adresse e-mail ou mot de passe incorrect.');
                }

                // ✅ Succès : Reset des compteurs
                $user->setFailedAttempts(0);
                $user->setLockedUntil(null);
                $user->setLastLoginAt(new \DateTimeImmutable());
                $user->setLastLoginIp($ip);
                $this->entityManager->flush();

                return $user;
            }),
            new PasswordCredentials($password),
            [
                new RememberMeBadge(),
                new PasswordUpgradeBadge($password, $this->userRepository),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): Response
    {
        /** @var \App\Entity\User $user */
        $user = $token->getUser();

        // Log de connexion réussie
        $this->logger->add(
            'Connexion',
            sprintf('Utilisateur %s connecté (IP: %s)', $user->getEmail(), $request->getClientIp()),
            $user->getEmail() // Passe l'email en 3ème argument si ton service le permet
        );
        // ⚡ DÉTECTION DU RÔLE POUR LA REDIRECTION
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            // Si c'est un admin -> On l'envoie vers la route secrète
            $redirectUrl = $this->router->generate('admin_dashboard');
        } else {
            // Si c'est un membre -> On l'envoie vers l'accueil
            $redirectUrl = $this->router->generate('home');
        }

        // On renvoie l'URL au Javascript qui fera la redirection
        return new JsonResponse([
            'success' => true,
            'message' => 'Connexion réussie',
            'redirect' => $redirectUrl,
        ]);
    }

    // ❌ C'est ICI qu'on loggue TOUTES les erreurs (Mauvais MDP, User inconnu, etc.)
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        $email = $request->request->get('email', 'Inconnu');
        $ip = $request->getClientIp();

        // On récupère le message d'erreur (ex: "Adresse e-mail ou mot de passe incorrect")
        // getMessageKey() récupère le message brut passé dans CustomUserMessageAuthenticationException
        $errorMessage = $exception->getMessageKey();

        // Traduction manuelle rapide pour les messages internes de Symfony si besoin
        if ($errorMessage == 'Invalid credentials.') {
            $errorMessage = 'Identifiants incorrects.';
        }

        // On enregistre le log
        $this->logger->add('Échec Connexion', sprintf('Pour: %s (IP: %s) - Raison: %s', $email, $ip, $errorMessage));

        return new JsonResponse([
            'success' => false,
            'message' => $errorMessage,
        ], 401);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->router->generate('app_login');
    }
}
