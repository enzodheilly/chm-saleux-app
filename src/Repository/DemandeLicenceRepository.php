<?php

namespace App\Repository;

use App\Entity\DemandeLicence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DemandeLicence>
 */
class DemandeLicenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeLicence::class);
    }

    /** Toutes les demandes, les plus récentes en premier. */
    public function findAllOrderedByDate(): array
    {
        return $this->createQueryBuilder('d')
            ->orderBy('d.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /** Demandes pas encore transférées à la FFHM (onglet "Demandes"). */
    public function findNonTransferees(): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.statutFfhm != :transferee')
            ->setParameter('transferee', DemandeLicence::STATUT_FFHM_TRANSFEREE)
            ->orderBy('d.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /** Demandes dont le paiement ou le transfert FFHM restent à traiter. */
    public function findEnAttente(): array
    {
        return $this->createQueryBuilder('d')
            ->where('d.statutPaiement != :payee OR d.statutFfhm != :transferee')
            ->setParameter('payee', DemandeLicence::STATUT_PAIEMENT_PAYEE)
            ->setParameter('transferee', DemandeLicence::STATUT_FFHM_TRANSFEREE)
            ->orderBy('d.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
