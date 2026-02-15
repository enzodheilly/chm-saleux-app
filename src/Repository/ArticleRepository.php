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
     * Pour la home : récupère les N derniers articles (triés par date).
     */
    public function findLatest(int $limit = 3): array
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère les articles filtrés par catégorie (string), date et pagination.
     * Retourne ['data' => Article[], 'total' => int]
     */
    public function findFilteredArticles(
        ?string $categorieName,
        ?string $dateFrom,
        ?string $dateTo,
        int $page,
        int $limit
    ): array {
        $page = max(1, $page);
        $limit = max(1, $limit);
        $offset = ($page - 1) * $limit;

        $qb = $this->baseFilteredQb($categorieName, $dateFrom, $dateTo);

        // ✅ Total via COUNT SQL (rapide)
        $countQb = clone $qb;
        $total = (int) $countQb
            ->select('COUNT(a.id)')
            ->resetDQLPart('orderBy')
            ->getQuery()
            ->getSingleScalarResult();

        // ✅ Data paginée
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

    /**
     * Construit le QueryBuilder de base avec filtres.
     */
    private function baseFilteredQb(?string $categorieName, ?string $dateFrom, ?string $dateTo): QueryBuilder
    {
        $qb = $this->createQueryBuilder('a')
            ->orderBy('a.publishedAt', 'DESC');

        if ($categorieName) {
            $qb->andWhere('LOWER(a.categorie) = LOWER(:catname)')
                ->setParameter('catname', $categorieName);
        }

        if (!empty($dateFrom)) {
            // si dateFrom invalide => DateTime va throw, tu peux try/catch si besoin
            $qb->andWhere('a.publishedAt >= :dateFrom')
                ->setParameter('dateFrom', new \DateTimeImmutable($dateFrom));
        }

        if (!empty($dateTo)) {
            $qb->andWhere('a.publishedAt <= :dateTo')
                ->setParameter('dateTo', (new \DateTimeImmutable($dateTo))->setTime(23, 59, 59));
        }

        return $qb;
    }
}
