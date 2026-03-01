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

    public function findOneByNumber(string $number): ?Licence
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.number = :number')
            ->setParameter('number', trim($number))
            ->getQuery()
            ->getOneOrNullResult();
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
