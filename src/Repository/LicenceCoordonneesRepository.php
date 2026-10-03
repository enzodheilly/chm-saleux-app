<?php

namespace App\Repository;

use App\Entity\LicenceCoordonnees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LicenceCoordonnees>
 */
class LicenceCoordonneesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LicenceCoordonnees::class);
    }
}
