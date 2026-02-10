<?php

namespace App\Repository;

use App\Entity\SecurityLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SecurityLog>
 */
class SecurityLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecurityLog::class);
    }

    /**
     * 🔍 Recherche globale mise à jour avec les nouveaux champs
     */
    public function searchLogs(?string $term): array
    {
        $qb = $this->createQueryBuilder('l')
            ->orderBy('l.createdAt', 'DESC');

        if ($term) {
            $qb->andWhere('
                l.user LIKE :term 
                OR l.ip LIKE :term 
                OR l.message LIKE :term
                OR l.type LIKE :term
            ')
                ->setParameter('term', '%' . $term . '%');
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * 📈 Statistiques pour Chart.js (Adapté au champ 'type')
     * On compte les logs qui ne sont pas de type 'erreur'
     */
    public function getSuccessCountByDay(int $days = 7): array
    {
        $from = new \DateTimeImmutable("-{$days} days 00:00:00");

        $qb = $this->createQueryBuilder('l')
            ->where('l.type != :errorType')
            ->andWhere('l.createdAt >= :from')
            ->setParameter('errorType', 'erreur')
            ->setParameter('from', $from)
            ->orderBy('l.createdAt', 'ASC');

        $logs = $qb->getQuery()->getResult();

        // Initialisation du tableau avec les dates
        $result = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = (new \DateTimeImmutable("-{$i} days"))->format('d/m'); // Format plus lisible pour JS
            $result[$date] = 0;
        }

        foreach ($logs as $log) {
            $date = $log->getCreatedAt()->format('d/m');
            if (isset($result[$date])) {
                $result[$date]++;
            }
        }

        return $result;
    }

    /**
     * ❌ Compte le nombre d’échecs récents (ex: 24h)
     */
    public function countFailedSince(\DateTimeImmutable $since): int
    {
        return (int) $this->createQueryBuilder('l')
            ->select('COUNT(l.id)')
            ->where('l.type = :type')
            ->andWhere('l.createdAt >= :since')
            ->setParameter('type', 'erreur')
            ->setParameter('since', $since)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * 🧹 Purge automatique
     */
    public function purgeOlderThan(int $days): int
    {
        $limit = new \DateTimeImmutable("-{$days} days");

        return $this->createQueryBuilder('l')
            ->delete()
            ->where('l.createdAt < :limit')
            ->setParameter('limit', $limit)
            ->getQuery()
            ->execute();
    }

    /**
     * 📈 Compte le nombre total de connexions réussies
     * On considère comme "réussi" tout ce qui n'est pas de type 'erreur'
     */
    public function countSuccessful(): int
    {
        return (int) $this->createQueryBuilder('l')
            ->select('COUNT(l.id)')
            ->where('l.type = :type')
            ->setParameter('type', 'connexion')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * 🕓 Récupère les dernières activités pour le Dashboard
     */
    public function findRecent(int $limit = 10): array
    {
        return $this->createQueryBuilder('l')
            ->orderBy('l.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function getTopSuspiciousIps(int $limit = 5): array
    {
        return $this->createQueryBuilder('l')
            ->select('l.ip, COUNT(l.id) as attempts')
            ->where('l.type = :type')
            ->setParameter('type', 'erreur')
            ->groupBy('l.ip')
            ->orderBy('attempts', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function getTopTargetedUsers(int $limit = 5): array
    {
        return $this->createQueryBuilder('l')
            ->select('l.user, COUNT(l.id) as attempts')
            ->where('l.type = :type')
            ->setParameter('type', 'erreur')
            ->groupBy('l.user')
            ->orderBy('attempts', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
