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

    /**
     * Recherche une demande déjà en cours (pas encore transférée à la FFHM)
     * correspondant à la même identité : même email, OU même nom+prénom,
     * OU même téléphone (si renseigné). Bloque les doubles envois du formulaire.
     */
    public function findDoublonEnCours(string $email, string $nom, string $prenom, ?string $telephone): ?DemandeLicence
    {
        $qb = $this->createQueryBuilder('d')
            ->andWhere('d.statutFfhm != :transferee')
            ->setParameter('transferee', DemandeLicence::STATUT_FFHM_TRANSFEREE)
            ->andWhere(
                '(LOWER(d.email) = :email) OR ' .
                '(LOWER(d.nom) = :nom AND LOWER(d.prenom) = :prenom)' .
                ($telephone !== null && $telephone !== '' ? ' OR (d.telephone = :telephone)' : '')
            )
            ->setParameter('email', mb_strtolower($email))
            ->setParameter('nom', mb_strtolower($nom))
            ->setParameter('prenom', mb_strtolower($prenom))
            ->orderBy('d.createdAt', 'DESC')
            ->setMaxResults(1);

        if ($telephone !== null && $telephone !== '') {
            $qb->setParameter('telephone', $telephone);
        }

        return $qb->getQuery()->getOneOrNullResult();
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
