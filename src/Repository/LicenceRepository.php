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
            ->setParameter('number', $number)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function recoverByIdentity(
        ?string $firstName,
        ?string $lastName,
        ?string $email
    ): array {
        $qb = $this->createQueryBuilder('l');

        if ($firstName) {
            $qb->andWhere('LOWER(l.firstName) LIKE LOWER(:firstName)')
                ->setParameter('firstName', '%' . trim($firstName) . '%');
        }

        if ($lastName) {
            $qb->andWhere('LOWER(l.lastName) LIKE LOWER(:lastName)')
                ->setParameter('lastName', '%' . trim($lastName) . '%');
        }

        if ($email) {
            $qb->andWhere('LOWER(l.email) = LOWER(:email)')
                ->setParameter('email', trim($email));
        }

        return $qb
            ->orderBy('l.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
