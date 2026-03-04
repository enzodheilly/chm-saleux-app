<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * Derniers articles pour la home.
     */
    public function findLatest(int $limit = 3): array
    {
        $limit = max(1, min($limit, 50));

        return $this->createQueryBuilder('a')
            ->leftJoin('a.category', 'c')
            ->addSelect('c')
            ->orderBy('a.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Retourne ['data' => Article[], 'total' => int]
     */
    public function findFilteredArticles(
        ?string $categoryName,
        ?\DateTimeImmutable $dateFrom,
        ?\DateTimeImmutable $dateTo,
        int $page,
        int $limit
    ): array {
        $page = max(1, $page);
        $limit = max(1, min($limit, 100));
        $offset = ($page - 1) * $limit;

        $qb = $this->baseFilteredQb($categoryName, $dateFrom, $dateTo);

        $countQb = clone $qb;
        $total = (int) $countQb
            ->select('COUNT(DISTINCT a.id)')
            ->resetDQLPart('orderBy')
            ->getQuery()
            ->getSingleScalarResult();

        $data = $qb
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return [
            'data' => $data,
            'total' => $total,
        ];
    }

    private function baseFilteredQb(
        ?string $categoryName,
        ?\DateTimeImmutable $dateFrom,
        ?\DateTimeImmutable $dateTo
    ): QueryBuilder {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.category', 'c')
            ->addSelect('c')
            ->orderBy('a.publishedAt', 'DESC');

        if ($categoryName) {
            $qb->andWhere('LOWER(c.name) = LOWER(:catname)')
                ->setParameter('catname', trim($categoryName));
        }

        if ($dateFrom) {
            $qb->andWhere('a.publishedAt >= :dateFrom')
                ->setParameter('dateFrom', $dateFrom->setTime(0, 0, 0));
        }

        if ($dateTo) {
            $qb->andWhere('a.publishedAt <= :dateTo')
                ->setParameter('dateTo', $dateTo->setTime(23, 59, 59));
        }

        return $qb;
    }
}
