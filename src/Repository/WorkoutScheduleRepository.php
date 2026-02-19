<?php

namespace App\Repository;

use App\Entity\WorkoutSchedule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WorkoutSchedule>
 */
class WorkoutScheduleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        // On utilise bien ::class ici
        parent::__construct($registry, WorkoutSchedule::class);
    }
}
