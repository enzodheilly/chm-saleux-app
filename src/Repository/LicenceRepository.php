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
    public function findByTypes(array $types): array
    {
        if ($types === []) {
            return [];
        }

        return $this->createQueryBuilder('l')
            ->andWhere('l.type IN (:types)')
            ->setParameter('types', $types)
            ->orderBy('l.id', 'DESC')
            ->getQuery()
            ->getResult();
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
