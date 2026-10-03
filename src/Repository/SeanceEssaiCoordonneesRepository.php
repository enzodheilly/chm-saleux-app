<?php

namespace App\Repository;

use App\Entity\SeanceEssaiCoordonnees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SeanceEssaiCoordonnees>
 */
class SeanceEssaiCoordonneesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SeanceEssaiCoordonnees::class);
    }
}
