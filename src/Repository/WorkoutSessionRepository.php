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
            ->orderBy('w.performedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère les séances d'un utilisateur sur une période donnée.
     * Si $range = 0, on retourne tout.
     *
     * @return WorkoutSession[]
     */
    public function findSessionsByUserAndRange(User $user, int $range = 30, ?int $limit = null): array
    {
        $qb = $this->createQueryBuilder('ws')
            ->leftJoin('ws.workoutSchedule', 'sched')
            ->addSelect('sched')
            ->andWhere('ws.user = :user')
            ->setParameter('user', $user)
            ->orderBy('ws.performedAt', 'DESC');

        if ($range > 0) {
            $from = (new \DateTimeImmutable())->modify("-{$range} days");
            $qb->andWhere('ws.performedAt >= :from')
                ->setParameter('from', $from);
        }

        if ($limit !== null) {
            $qb->setMaxResults($limit);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Retourne les stats globales d'un utilisateur sur une période donnée.
     * Compatible avec ton app mobile :
     * - sessions
     * - total_volume
     * - total_duration_seconds
     * - total_completed_sets
     */
    public function getStatsByUserAndRange(User $user, int $range = 30): array
    {
        $qb = $this->createQueryBuilder('ws')
            ->select('
                COUNT(ws.id) as sessionsCount,
                COALESCE(SUM(ws.totalVolume), 0) as totalVolume,
                COALESCE(SUM(ws.durationSeconds), 0) as totalDuration,
                COALESCE(SUM(ws.totalCompletedSets), 0) as totalCompletedSets
            ')
            ->andWhere('ws.user = :user')
            ->setParameter('user', $user);

        if ($range > 0) {
            $from = (new \DateTimeImmutable())->modify("-{$range} days");
            $qb->andWhere('ws.performedAt >= :from')
                ->setParameter('from', $from);
        }

        $result = $qb->getQuery()->getSingleResult();

        return [
            'sessions' => (int) ($result['sessionsCount'] ?? 0),
            'total_volume' => (float) ($result['totalVolume'] ?? 0),
            'total_duration_seconds' => (int) ($result['totalDuration'] ?? 0),
            'total_completed_sets' => (int) ($result['totalCompletedSets'] ?? 0),
        ];
    }
}
