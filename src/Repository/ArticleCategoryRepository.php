<?php

namespace App\Repository;

use App\Entity\ArticleCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArticleCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleCategory::class);
    }

    public function findUsedCategories(): array
    {
        return $this->createQueryBuilder('c')
            ->innerJoin('c.articles', 'a')
            ->distinct()
            ->orderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
