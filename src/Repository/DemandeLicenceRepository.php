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
     *
     * Le téléphone est maintenant chiffré (voir DemandeLicenceCoordonnees /
     * EncryptedStringType), avec un IV aléatoire à chaque écriture : deux
     * lignes portant le même numéro n'ont jamais le même texte chiffré en
     * base, donc une comparaison `=` en SQL est impossible. On compare donc
     * en PHP après déchiffrement, sur l'ensemble des demandes "en cours" —
     * un petit ensemble par nature (pas encore transférées à la FFHM), donc
     * sans impact de performance pour un club de cette taille.
     */
    public function findDoublonEnCours(string $email, string $nom, string $prenom, ?string $telephone): ?DemandeLicence
    {
        $candidats = $this->createQueryBuilder('d')
            ->leftJoin('d.coordonnees', 'c')->addSelect('c')
            ->andWhere('d.statutFfhm != :transferee')
            ->setParameter('transferee', DemandeLicence::STATUT_FFHM_TRANSFEREE)
            ->orderBy('d.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

        $emailLower = mb_strtolower($email);
        $nomLower = mb_strtolower($nom);
        $prenomLower = mb_strtolower($prenom);
        $telephoneRenseigne = $telephone !== null && $telephone !== '';

        foreach ($candidats as $candidat) {
            $memeIdentite = mb_strtolower($candidat->getEmail()) === $emailLower
                || (mb_strtolower($candidat->getNom()) === $nomLower && mb_strtolower($candidat->getPrenom()) === $prenomLower);
            $memeTelephone = $telephoneRenseigne && $candidat->getTelephone() === $telephone;

            if ($memeIdentite || $memeTelephone) {
                return $candidat;
            }
        }

        return null;
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
