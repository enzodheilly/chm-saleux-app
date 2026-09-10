<?php

namespace App\Repository;

use App\Entity\SiteBanner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SiteBannerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SiteBanner::class);
    }

    public function findSingleton(): ?SiteBanner
    {
        return $this->findOneBy([]);
    }

    public function findActive(): ?SiteBanner
    {
        $banner = $this->findOneBy(['isActive' => true]);

        if ($banner === null || empty(trim((string) $banner->getMessage()))) {
            return null;
        }

        return $banner;
    }
}
