<?php

namespace App\Service;

use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;

class SystemLoggerService
{
    public function __construct(
        private EntityManagerInterface $em,
        private Security $security
    ) {}

    // J'ajoute ?string $contextUser = null à la fin
    public function add(string $type, string $message, ?string $contextUser = null): void
    {
        // 1. On essaie de récupérer l'utilisateur connecté
        $user = $this->security->getUser();

        // 2. On détermine qui est l'auteur :
        // - Si on a passé un email manuellement (ex: lors d'un échec connexion), on le prend.
        // - Sinon, si un user est connecté, on prend son email.
        // - Sinon, c'est le "Système" ou "Anonyme".
        if ($contextUser) {
            $identifier = $contextUser;
        } elseif ($user) {
            $identifier = $user->getUserIdentifier(); // Renvoie l'email généralement
        } else {
            $identifier = 'Système';
        }

        $log = new Log();
        $log->setType($type)
            ->setMessage($message)
            ->setUser($identifier)
            ->setCreatedAt(new \DateTimeImmutable()); // ✅ IMPORTANT : On enregistre l'heure !

        $this->em->persist($log);
        $this->em->flush();
    }
}
