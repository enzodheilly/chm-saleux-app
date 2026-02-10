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
        private UserRepository $userRepository // Pour retrouver l'objet User si besoin
    ) {}

    public function add(string $type, string $message, ?string $contextEmail = null): void
    {
        $log = new SecurityLog();
        $log->setType($type)
            ->setMessage($message)
            ->setCreatedAt(new \DateTimeImmutable());

        // 1. On gère l'utilisateur
        $currentUser = $this->security->getUser();

        if ($contextEmail) {
            // On remplit ton champ spécifique emailAttempt
            $log->setEmailAttempt($contextEmail);

            // Optionnel : On essaie de lier l'objet User si l'email existe en BDD
            $userEntity = $this->userRepository->findOneBy(['email' => $contextEmail]);
            if ($userEntity) {
                $log->setUser($userEntity);
            }
        } elseif ($currentUser instanceof \App\Entity\User) {
            // Si quelqu'est connecté, on lie l'objet User
            $log->setUser($currentUser);
            $log->setEmailAttempt($currentUser->getUserIdentifier());
        }

        // 2. Capture technique (IP, Browser, OS via UserAgent)
        $request = $this->requestStack->getCurrentRequest();
        if ($request) {
            $ua = $request->headers->get('User-Agent');
            $log->setIp($request->getClientIp());
            $log->setUserAgent($ua);

            // On remplit tes champs os et browser
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
