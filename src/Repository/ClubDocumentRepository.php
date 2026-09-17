<?php

namespace App\Repository;

use App\Entity\ClubDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ClubDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClubDocument::class);
    }

    public function findBySlug(string $slug): ?ClubDocument
    {
        return $this->findOneBy(['slug' => $slug]);
    }
}
