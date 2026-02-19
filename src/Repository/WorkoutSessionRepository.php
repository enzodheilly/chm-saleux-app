<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\WorkoutSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WorkoutSession>
 *
 * @method WorkoutSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkoutSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkoutSession[]    findAll()
 * @method WorkoutSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkoutSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkoutSession::class);
    }

    /**
     * Sauvegarde une séance en base de données.
     */
    public function save(WorkoutSession $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Supprime une séance de la base de données.
     */
    public function remove(WorkoutSession $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Récupère tout l'historique d'un utilisateur, trié du plus récent au plus ancien.
     * Utile pour la page "Progrès" ou "Historique".
     *
     * @return WorkoutSession[]
     */
    public function findHistoryByUser(User $user): array
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.user = :user')
            ->setParameter('user', $user)
            ->orderBy('w.performedAt', 'DESC') // Tri par date décroissante (le plus récent en haut)
            ->getQuery()
            ->getResult();
    }
}
