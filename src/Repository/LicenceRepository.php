<?php

namespace App\Repository;

use App\Entity\Licence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LicenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Licence::class);
    }

    /**
     * Licences dont le type correspond à une des formules données (ex. les
     * formules FFHM "Jeune", "Compétition", "Loisir & Muscu"), les plus
     * récentes en premier. Sert à isoler les licences FFHM des licences
     * salle/abonnement classiques dans la même table générale.
     */
    public function findByTypes(array $types, ?bool $activee = null, ?int $saisonFinAnnee = null): array
    {
        if ($types === []) {
            return [];
        }

        $qb = $this->createQueryBuilder('l')
            ->andWhere('l.type IN (:types)')
            ->setParameter('types', $types);

        if ($activee !== null) {
            $qb->andWhere('l.activee = :activee')
               ->setParameter('activee', $activee);
        }

        if ($saisonFinAnnee !== null) {
            // YEAR() n'est pas une fonction DQL enregistrée dans ce projet — on
            // filtre par plage de dates plutôt que d'extraire l'année en DQL.
            $qb->andWhere('l.expiryDate BETWEEN :saisonDebut AND :saisonFin')
               ->setParameter('saisonDebut', new \DateTimeImmutable($saisonFinAnnee . '-01-01 00:00:00'))
               ->setParameter('saisonFin',   new \DateTimeImmutable($saisonFinAnnee . '-12-31 23:59:59'));
        }

        return $qb
            ->orderBy('l.lastName', 'ASC')
            ->addOrderBy('l.firstName', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Retourne les années de fin de saison distinctes (pour le filtre).
     * Utilise SQL natif — YEAR() n'est pas une fonction DQL enregistrée ici.
     */
    public function findDistinctSaisonFinAnnees(array $types): array
    {
        if ($types === []) {
            return [];
        }

        $conn         = $this->getEntityManager()->getConnection();
        $placeholders = implode(',', array_fill(0, count($types), '?'));

        $rows = $conn->executeQuery(
            "SELECT DISTINCT YEAR(expiry_date) AS annee FROM licence WHERE type IN ($placeholders) ORDER BY annee DESC",
            $types
        )->fetchFirstColumn();

        return array_map('intval', $rows);
    }

    public function findOneByNumber(string $number): ?Licence
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.number = :number')
            ->setParameter('number', trim($number))
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function searchByName(string $term): array
    {
        $like = '%' . addcslashes($term, '%_') . '%';

        return $this->createQueryBuilder('l')
            ->where('l.firstName LIKE :term OR l.lastName LIKE :term OR CONCAT(l.firstName, \' \', l.lastName) LIKE :term OR CONCAT(l.lastName, \' \', l.firstName) LIKE :term')
            ->setParameter('term', $like)
            ->orderBy('l.id', 'DESC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();
    }

    /**
     * Licence la plus récente pour un email donné (insensible à la casse).
     * Sert à détecter automatiquement un renouvellement lors d'une nouvelle demande.
     */
    public function findOneByEmail(string $email): ?Licence
    {
        $email = trim($email);
        if ($email === '') {
            return null;
        }

        return $this->createQueryBuilder('l')
            ->andWhere('LOWER(l.email) = LOWER(:email)')
            ->setParameter('email', $email)
            ->orderBy('l.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Date d'expiration de la licence la plus ancienne connue pour cet email.
     */
    public function findOldestExpiryDateByEmail(string $email): ?\DateTimeInterface
    {
        $email = trim($email);
        if ($email === '') {
            return null;
        }

        $licence = $this->createQueryBuilder('l')
            ->andWhere('LOWER(l.email) = LOWER(:email)')
            ->setParameter('email', $email)
            ->orderBy('l.expiryDate', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        return $licence?->getExpiryDate();
    }

    /**
     * Vrai s'il existe déjà, pour la saison en cours (même date d'expiration),
     * une licence au même nom de famille et à une autre adresse email — utilisé
     * pour la gratuité "Benjamin" automatique (parent déjà licencié au club).
     * Correspondance sur le nom de famille uniquement : à vérifier ponctuellement
     * par le bureau en cas d'homonymie.
     */
    public function existeDejaLicenceMemeFamilleSaison(string $lastName, string $emailExclu, \DateTimeInterface $finDeSaison): bool
    {
        $lastName = trim($lastName);
        if ($lastName === '') {
            return false;
        }

        $count = (int) $this->createQueryBuilder('l')
            ->select('COUNT(l.id)')
            ->andWhere('LOWER(l.lastName) = LOWER(:lastName)')
            ->andWhere('LOWER(l.email) != LOWER(:email)')
            ->andWhere('l.expiryDate = :finDeSaison')
            ->setParameter('lastName', $lastName)
            ->setParameter('email', trim($emailExclu))
            ->setParameter('finDeSaison', $finDeSaison)
            ->getQuery()
            ->getSingleScalarResult();

        return $count > 0;
    }

    public function recoverByIdentity(
        ?string $firstName,
        ?string $lastName,
        ?string $email
    ): array {
        $qb = $this->createQueryBuilder('l');

        $firstName = $firstName !== null ? trim($firstName) : null;
        $lastName = $lastName !== null ? trim($lastName) : null;
        $email = $email !== null ? trim($email) : null;

        if ($firstName !== null && $firstName !== '') {
            $qb->andWhere('LOWER(l.firstName) LIKE LOWER(:firstName)')
                ->setParameter('firstName', '%' . $firstName . '%');
        }

        if ($lastName !== null && $lastName !== '') {
            $qb->andWhere('LOWER(l.lastName) LIKE LOWER(:lastName)')
                ->setParameter('lastName', '%' . $lastName . '%');
        }

        if ($email !== null && $email !== '') {
            $qb->andWhere('LOWER(l.email) = LOWER(:email)')
                ->setParameter('email', $email);
        }

        return $qb
            ->orderBy('l.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
