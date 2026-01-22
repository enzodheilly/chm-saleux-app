<?php

// src/Repository/ArticleRepository.php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * Récupère les articles filtrés par catégorie (string), date et pagination.
     */
    public function findFilteredArticles(?string $categorieName, ?string $dateFrom, ?string $dateTo, int $page, int $limit): array
    {
        $qb = $this->createQueryBuilder('a')
            ->orderBy('a.publishedAt', 'DESC');

        // 🔹 Filtre par catégorie (string)
        if ($categorieName) {
            $qb->andWhere('LOWER(a.categorie) = LOWER(:catname)')
                ->setParameter('catname', $categorieName);
        }

        // 🔹 Filtre par date "de"
        if (!empty($dateFrom)) {
            $qb->andWhere('a.publishedAt >= :dateFrom')
                ->setParameter('dateFrom', new \DateTime($dateFrom));
        }

        // 🔹 Filtre par date "à"
        if (!empty($dateTo)) {
            $qb->andWhere('a.publishedAt <= :dateTo')
                ->setParameter('dateTo', (new \DateTime($dateTo))->setTime(23, 59, 59));
        }

        // 🔹 Pagination
        $offset = ($page - 1) * $limit;

        // Total avant pagination
        $countQb = clone $qb;
        $total = count($countQb->getQuery()->getResult());

        // Résultats paginés
        $data = $qb->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return [
            'data' => $data,
            'total' => $total,
        ];
    }
}
