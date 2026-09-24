<?php

namespace App\Repository;

use App\Entity\SiteBannerMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SiteBannerMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SiteBannerMessage::class);
    }

    /** Messages actifs triés par position (usage front) */
    public function findAllActive(): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.isActive = true')
            ->orderBy('m.position', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /** Tous les messages triés par position (usage admin) */
    public function findAllOrdered(): array
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.position', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /** Prochain entier de position disponible */
    public function nextPosition(): int
    {
        $result = $this->createQueryBuilder('m')
            ->select('MAX(m.position)')
            ->getQuery()
            ->getSingleScalarResult();

        return ($result === null ? -1 : (int) $result) + 1;
    }
}
