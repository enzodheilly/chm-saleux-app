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
     * Logs filtrés par catégorie (server-side filtering pour les tabs du dashboard)
     */
    public function findFiltered(string $filter = 'all', int $limit = 200): array
    {
        $qb = $this->createQueryBuilder('l')
            ->orderBy('l.createdAt', 'DESC')
            ->setMaxResults($limit);

        match ($filter) {
            'connexion' => $qb->where('l.type = :t')->andWhere('l.success = :s')
                              ->setParameter('t', 'Connexion')->setParameter('s', true),
            'echec'     => $qb->where('l.type = :t')->andWhere('l.success = :s')
                              ->setParameter('t', 'Connexion')->setParameter('s', false),
            'admin'     => $qb->where('l.type = :t')->setParameter('t', 'Admin'),
            'securite'  => $qb->where('l.type IN (:types)')
                              ->setParameter('types', ['Session', 'Sécurité', 'connexion']),
            default     => null,
        };

        return $qb->getQuery()->getResult();
    }

    public function countAll(): int
    {
        return (int) $this->createQueryBuilder('l')->select('COUNT(l.id)')->getQuery()->getSingleScalarResult();
    }

    public function countByTypeAndSuccess(string $type, ?bool $success = null): int
    {
        $qb = $this->createQueryBuilder('l')
            ->select('COUNT(l.id)')
            ->where('l.type = :type')
            ->setParameter('type', $type);

        if ($success !== null) {
            $qb->andWhere('l.success = :s')->setParameter('s', $success);
        }

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * Connexions (succès ou échec) groupées par jour sur N jours.
     * Utilisé pour le graphique en courbe du dashboard.
     */
    public function getLogsByDayAndSuccess(int $days, bool $success): array
    {
        $from = new \DateTimeImmutable("-{$days} days 00:00:00");

        $logs = $this->createQueryBuilder('l')
            ->where('l.type = :type')
            ->andWhere('l.success = :s')
            ->andWhere('l.createdAt >= :from')
            ->setParameter('type', 'Connexion')
            ->setParameter('s', $success)
            ->setParameter('from', $from)
            ->orderBy('l.createdAt', 'ASC')
            ->getQuery()
            ->getResult();

        $result = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = (new \DateTimeImmutable("-{$i} days"))->format('d/m');
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
     * Comptage avec filtre type + success + depuis une date.
     */
    public function countSince(string $type, ?bool $success, \DateTimeImmutable $since): int
    {
        $qb = $this->createQueryBuilder('l')
            ->select('COUNT(l.id)')
            ->where('l.type = :type')
            ->andWhere('l.createdAt >= :since')
            ->setParameter('type', $type)
            ->setParameter('since', $since);

        if ($success !== null) {
            $qb->andWhere('l.success = :s')->setParameter('s', $success);
        }

        return (int) $qb->getQuery()->getSingleScalarResult();
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
    /**
     * Répartition des OS depuis les logs (pour donut), avec normalisation des anciennes valeurs.
     */
    public function getOsDistribution(): array
    {
        $rows = $this->createQueryBuilder('l')
            ->select('l.os, COUNT(l.id) as cnt')
            ->where('l.os IS NOT NULL')
            ->andWhere("l.os != ''")
            ->groupBy('l.os')
            ->orderBy('cnt', 'DESC')
            ->getQuery()
            ->getResult();

        $normalized = [];
        foreach ($rows as $row) {
            $os  = $this->normalizeOs($row['os']);
            $normalized[$os] = ($normalized[$os] ?? 0) + (int) $row['cnt'];
        }

        arsort($normalized);
        $normalized = array_slice($normalized, 0, 6, true);

        return ['labels' => array_keys($normalized), 'values' => array_values($normalized)];
    }

    private function normalizeOs(string $os): string
    {
        if (str_starts_with($os, 'Windows'))                          return 'Windows';
        if (str_starts_with($os, 'macOS') || str_starts_with($os, 'Mac')) return 'macOS';
        if ($os === 'iOS' || str_contains($os, 'iPhone') || str_contains($os, 'iPad')) return 'iOS';
        if ($os === 'Android' || str_starts_with($os, 'Android'))     return 'Android';
        if ($os === 'Linux')                                           return 'Linux';
        if ($os === 'ChromeOS')                                        return 'ChromeOS';
        return 'Inconnu';
    }

    /**
     * Connexions groupées par heure de la journée (0–23), sur les N derniers jours.
     */
    public function getLoginsByHour(int $days = 30): array
    {
        $from = (new \DateTimeImmutable("-{$days} days"))->format('Y-m-d H:i:s');

        $conn = $this->getEntityManager()->getConnection();
        $sql  = '
            SELECT HOUR(created_at) AS h, success, COUNT(id) AS cnt
            FROM security_log
            WHERE type = :type
              AND created_at >= :from
            GROUP BY h, success
            ORDER BY h ASC
        ';

        $rows = $conn->executeQuery($sql, ['type' => 'Connexion', 'from' => $from])->fetchAllAssociative();

        $success = array_fill(0, 24, 0);
        $fails   = array_fill(0, 24, 0);

        foreach ($rows as $row) {
            $h = (int) $row['h'];
            if ((int) $row['success'] === 1) {
                $success[$h] = (int) $row['cnt'];
            } else {
                $fails[$h] = (int) $row['cnt'];
            }
        }

        return ['success' => $success, 'fails' => $fails];
    }

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
