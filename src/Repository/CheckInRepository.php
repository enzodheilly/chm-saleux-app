<?php

namespace App\Repository;

use App\Entity\CheckIn;
use App\Entity\Licence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CheckIn>
 */
class CheckInRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CheckIn::class);
    }

    /**
     * Dernier passage du jour pour une licence (sert à déterminer si le prochain scan est une entrée ou une sortie).
     */
    public function findLastForLicenceToday(Licence $licence): ?CheckIn
    {
        $startOfDay = new \DateTimeImmutable('today');

        return $this->createQueryBuilder('c')
            ->where('c.licence = :licence')
            ->andWhere('c.scannedAt >= :startOfDay')
            ->setParameter('licence', $licence)
            ->setParameter('startOfDay', $startOfDay)
            ->orderBy('c.scannedAt', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Nombre d'entrées (IN) par jour sur les N derniers jours, pour un graphique de fréquentation.
     */
    public function countByDay(int $days = 7): array
    {
        $from = new \DateTimeImmutable("-{$days} days 00:00:00");

        $checkIns = $this->createQueryBuilder('c')
            ->where('c.type = :type')
            ->andWhere('c.scannedAt >= :from')
            ->setParameter('type', CheckIn::TYPE_IN)
            ->setParameter('from', $from)
            ->getQuery()
            ->getResult();

        $result = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = (new \DateTimeImmutable("-{$i} days"))->format('d/m');
            $result[$date] = 0;
        }

        foreach ($checkIns as $checkIn) {
            $date = $checkIn->getScannedAt()->format('d/m');
            if (isset($result[$date])) {
                $result[$date]++;
            }
        }

        return $result;
    }

    /**
     * Répartition des entrées (IN) par heure de la journée sur les N derniers jours (heures de pointe).
     */
    public function countByHourOfDay(int $days = 30): array
    {
        $from = new \DateTimeImmutable("-{$days} days 00:00:00");

        $checkIns = $this->createQueryBuilder('c')
            ->where('c.type = :type')
            ->andWhere('c.scannedAt >= :from')
            ->setParameter('type', CheckIn::TYPE_IN)
            ->setParameter('from', $from)
            ->getQuery()
            ->getResult();

        $result = array_fill(0, 24, 0);

        foreach ($checkIns as $checkIn) {
            $hour = (int) $checkIn->getScannedAt()->format('G');
            $result[$hour]++;
        }

        return $result;
    }

    /**
     * Répartition des entrées (IN) par heure de la journée, pour aujourd'hui uniquement
     * (utilisé par le graphique de fréquentation en direct sur l'app mobile).
     */
    public function countTodayByHour(): array
    {
        $startOfDay = new \DateTimeImmutable('today');

        $checkIns = $this->createQueryBuilder('c')
            ->where('c.type = :type')
            ->andWhere('c.scannedAt >= :from')
            ->setParameter('type', CheckIn::TYPE_IN)
            ->setParameter('from', $startOfDay)
            ->getQuery()
            ->getResult();

        $result = array_fill(0, 24, 0);

        foreach ($checkIns as $checkIn) {
            $hour = (int) $checkIn->getScannedAt()->format('G');
            $result[$hour]++;
        }

        return $result;
    }

    public function findRecent(int $limit = 15): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.scannedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Nombre d'adhérents actuellement présents (dernier passage du jour = IN).
     * Utilisé à la fois par le dashboard admin et par le compteur temps réel de l'app mobile.
     */
    public function countCurrentlyIn(): int
    {
        $startOfDay = new \DateTimeImmutable('today');

        $todayCheckIns = $this->createQueryBuilder('c')
            ->where('c.scannedAt >= :startOfDay')
            ->setParameter('startOfDay', $startOfDay)
            ->orderBy('c.scannedAt', 'ASC')
            ->getQuery()
            ->getResult();

        $lastTypeByLicence = [];
        foreach ($todayCheckIns as $checkIn) {
            $lastTypeByLicence[$checkIn->getLicence()->getId()] = $checkIn->getType();
        }

        return count(array_filter($lastTypeByLicence, fn (string $type) => $type === CheckIn::TYPE_IN));
    }

    /**
     * Durée moyenne de présence (en secondes) en appariant chaque IN avec le OUT suivant du même jour.
     */
    public function getAverageDurationSeconds(?Licence $licence = null, int $days = 30): float
    {
        $from = new \DateTimeImmutable("-{$days} days 00:00:00");

        $qb = $this->createQueryBuilder('c')
            ->where('c.scannedAt >= :from')
            ->setParameter('from', $from)
            ->orderBy('c.licence', 'ASC')
            ->addOrderBy('c.scannedAt', 'ASC');

        if ($licence !== null) {
            $qb->andWhere('c.licence = :licence')->setParameter('licence', $licence);
        }

        $checkIns = $qb->getQuery()->getResult();

        $durations = [];
        $pendingInByLicence = [];

        foreach ($checkIns as $checkIn) {
            $licenceId = $checkIn->getLicence()->getId();

            if ($checkIn->getType() === CheckIn::TYPE_IN) {
                $pendingInByLicence[$licenceId] = $checkIn->getScannedAt();
                continue;
            }

            if (isset($pendingInByLicence[$licenceId])) {
                $durations[] = $checkIn->getScannedAt()->getTimestamp() - $pendingInByLicence[$licenceId]->getTimestamp();
                unset($pendingInByLicence[$licenceId]);
            }
        }

        if (empty($durations)) {
            return 0.0;
        }

        return array_sum($durations) / count($durations);
    }
}
