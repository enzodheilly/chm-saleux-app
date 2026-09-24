<?php

namespace App\Service;

use App\Entity\SecurityLog;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;

class SystemLoggerService
{
    public const TYPE_CONNEXION = 'Connexion';
    public const TYPE_SESSION   = 'Session';
    public const TYPE_SECURITE  = 'Sécurité';
    public const TYPE_ADMIN     = 'Admin';

    public function __construct(
        private EntityManagerInterface $em,
        private Security $security,
        private RequestStack $requestStack,
        private UserRepository $userRepository
    ) {}

    /**
     * Pseudonymise un email pour les logs.
     * Ex: enzodheilly@gmail.com → e***@g***.com
     */
    public function pseudonymizeEmail(?string $email): ?string
    {
        if (!$email || !str_contains($email, '@')) {
            return $email;
        }

        [$local, $domain] = explode('@', $email, 2);

        $localPseudo = substr($local, 0, 1) . '***';

        $domainParts = explode('.', $domain);
        $tld = array_pop($domainParts);
        $domainPseudo = substr(implode('.', $domainParts), 0, 1) . '***.' . $tld;

        return $localPseudo . '@' . $domainPseudo;
    }

    public function add(string $type, string $message, ?string $contextEmail = null, bool $success = true): void
    {
        $log = new SecurityLog();
        $log->setType($type)
            ->setMessage($message)
            ->setSuccess($success)
            ->setCreatedAt(new \DateTimeImmutable());

        $currentUser = $this->security->getUser();

        if ($contextEmail) {
            $log->setEmailAttempt($this->pseudonymizeEmail($contextEmail));

            $userEntity = $this->userRepository->findOneBy(['email' => $contextEmail]);
            if ($userEntity) {
                $log->setUser($userEntity);
            }
        } elseif ($currentUser instanceof \App\Entity\User) {
            $log->setUser($currentUser);
            $log->setEmailAttempt($this->pseudonymizeEmail($currentUser->getUserIdentifier()));
        }

        $request = $this->requestStack->getCurrentRequest();
        if ($request) {
            $ua = $request->headers->get('User-Agent');
            $log->setIp($request->getClientIp());
            $log->setUserAgent($ua);

            if ($ua) {
                // OS detection
                if (str_contains($ua, 'Windows')) {
                    $log->setOs('Windows');
                } elseif (str_contains($ua, 'Android')) {
                    $log->setOs('Android');
                } elseif (str_contains($ua, 'iPhone') || str_contains($ua, 'iPad')) {
                    $log->setOs('iOS');
                } elseif (str_contains($ua, 'Macintosh') || str_contains($ua, 'Mac OS')) {
                    $log->setOs('macOS');
                } elseif (str_contains($ua, 'Linux')) {
                    $log->setOs('Linux');
                } elseif (str_contains($ua, 'CrOS')) {
                    $log->setOs('ChromeOS');
                } else {
                    $log->setOs('Inconnu');
                }

                // Browser detection (ordre important : Edge/OPR avant Chrome)
                if (str_contains($ua, 'Edg/') || str_contains($ua, 'Edge')) {
                    $log->setBrowser('Edge');
                } elseif (str_contains($ua, 'OPR') || str_contains($ua, 'Opera')) {
                    $log->setBrowser('Opera');
                } elseif (str_contains($ua, 'Firefox') || str_contains($ua, 'FxiOS')) {
                    $log->setBrowser('Firefox');
                } elseif (str_contains($ua, 'SamsungBrowser')) {
                    $log->setBrowser('Samsung');
                } elseif (str_contains($ua, 'Chrome') || str_contains($ua, 'CriOS')) {
                    $log->setBrowser('Chrome');
                } elseif (str_contains($ua, 'Safari')) {
                    $log->setBrowser('Safari');
                } else {
                    $log->setBrowser('Autre');
                }
            }
        }

        $this->em->persist($log);
        $this->em->flush();
    }
}
