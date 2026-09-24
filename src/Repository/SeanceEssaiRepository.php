<?php

namespace App\Repository;

use App\Entity\SeanceEssai;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SeanceEssai>
 */
class SeanceEssaiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SeanceEssai::class);
    }

    /** Toutes les séances, les plus récentes en premier. */
    public function findAllOrderedByDate(): array
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.dateSeance', 'DESC')
            ->addOrderBy('s.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche insensible à la casse et aux accents (utf8mb4_unicode_ci).
     * Cherche sur nom, prénom ou la concaténation des deux.
     */
    public function search(string $term): array
    {
        $like = '%' . addcslashes($term, '%_') . '%';

        return $this->createQueryBuilder('s')
            ->where('s.nom LIKE :term OR s.prenom LIKE :term OR CONCAT(s.prenom, \' \', s.nom) LIKE :term OR CONCAT(s.nom, \' \', s.prenom) LIKE :term')
            ->setParameter('term', $like)
            ->orderBy('s.dateSeance', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
