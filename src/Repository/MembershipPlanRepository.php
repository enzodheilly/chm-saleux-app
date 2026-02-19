<?php
// src/Repository/MembershipPlanRepository.php

namespace App\Repository;

use App\Entity\MembershipPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MembershipPlan>
 */
class MembershipPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MembershipPlan::class);
    }

    // Example custom methods (optional)

    public function findPopularPlans(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.isPopular = :popular')
            ->setParameter('popular', true)
            ->orderBy('p.price', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByBillingPeriod(string $billingPeriod): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.billingPeriod = :period')
            ->setParameter('period', $billingPeriod)
            ->orderBy('p.price', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
