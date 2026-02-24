<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\UserRoutine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserRoutine>
 */
class UserRoutineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserRoutine::class);
    }

    public function save(UserRoutine $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UserRoutine $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Retourne les routines d'un user, triées des plus récentes aux plus anciennes.
     *
     * @return UserRoutine[]
     */
    public function findByUserOrdered(User $user): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.user = :user')
            ->setParameter('user', $user)
            ->orderBy('r.createdAt', 'DESC')
            ->addOrderBy('r.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche simple par nom pour un utilisateur.
     *
     * @return UserRoutine[]
     */
    public function searchByNameForUser(User $user, string $query): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.user = :user')
            ->andWhere('LOWER(r.name) LIKE :q')
            ->setParameter('user', $user)
            ->setParameter('q', '%' . mb_strtolower(trim($query)) . '%')
            ->orderBy('r.createdAt', 'DESC')
            ->addOrderBy('r.id', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
