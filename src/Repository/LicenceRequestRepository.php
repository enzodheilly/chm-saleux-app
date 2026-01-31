<?php

namespace App\Repository;

use App\Entity\LicenceRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LicenceRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LicenceRequest::class);
    }

    /**
     * Supprime les demandes expirées de la base de données
     */
    public function clearExpiredRequests(): int
    {
        return $this->createQueryBuilder('lr')
            ->delete()
            ->where('lr.expiresAt < :now')
            ->setParameter('now', new \DateTimeImmutable())
            ->getQuery()
            ->execute();
    }
}
