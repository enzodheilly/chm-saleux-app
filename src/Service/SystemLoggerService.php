<?php

namespace App\Service;

use App\Entity\SecurityLog;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;

class SystemLoggerService
{
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

    public function add(string $type, string $message, ?string $contextEmail = null): void
    {
        $log = new SecurityLog();
        $log->setType($type)
            ->setMessage($message)
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
                if (str_contains($ua, 'Windows')) $log->setOs('Windows');
                elseif (str_contains($ua, 'iPhone')) $log->setOs('iOS');
                else $log->setOs('Autre');

                if (str_contains($ua, 'Firefox')) $log->setBrowser('Firefox');
                elseif (str_contains($ua, 'Chrome')) $log->setBrowser('Chrome');
                else $log->setBrowser('Navigateur');
            }
        }

        $this->em->persist($log);
        $this->em->flush();
    }
}
