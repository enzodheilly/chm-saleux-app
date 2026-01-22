<?php

namespace App\Repository;

use App\Entity\CategorieAthlete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CategorieAthleteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieAthlete::class);
    }

    // Ici tu peux ajouter des méthodes custom si besoin
}
