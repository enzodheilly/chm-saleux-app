<?php
// src/Repository/NewEquipmentRepository.php

namespace App\Repository;

use App\Entity\NewEquipment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class NewEquipmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewEquipment::class);
    }

    /**
     * Retrieve new equipment from most recent to oldest
     */
    public function findLatest(int $limit = 20): array
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
