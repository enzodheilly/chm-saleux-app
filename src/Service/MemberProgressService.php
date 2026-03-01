<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\WorkoutSession;
use App\Repository\WorkoutSessionRepository;

class MemberProgressService
{
    public function __construct(
        private readonly WorkoutSessionRepository $workoutSessionRepository
    ) {}

    /**
     * Retourne les stats globales pour un utilisateur sur une période donnée.
     */
    public function getProgressStatsForUser(User $user, int $rangeDays = 30): array
    {
        return $this->workoutSessionRepository->getStatsByUserAndRange($user, $rangeDays);
    }

    /**
     * Retourne les séances formatées pour le dashboard web / app mobile.
     */
    public function getWorkoutSessionsForUser(User $user, int $rangeDays = 30, ?int $limit = null): array
    {
        $sessions = $this->workoutSessionRepository->findSessionsByUserAndRange($user, $rangeDays, $limit);

        return array_map(function (WorkoutSession $session): array {
            return [
                'id' => $session->getId(),
                'performed_at' => $session->getPerformedAt()?->format(DATE_ATOM),
                'duration_seconds' => $session->getDurationSeconds() ?? 0,
                'total_volume' => $session->getTotalVolume() ?? 0,
                'total_completed_sets' => $session->getTotalCompletedSets() ?? 0,
                'routine_name' => $session->getRoutineName()
                    ?? $session->getWorkoutSchedule()?->getRoutineTemplate()?->getName()
                    ?? 'Séance',
                'routine_id' => $session->getRoutineId()
                    ?? $session->getWorkoutSchedule()?->getRoutineTemplate()?->getId(),
                'is_from_planning' => $session->getWorkoutSchedule() !== null,
            ];
        }, $sessions);
    }

    /**
     * Retourne tout l'historique formaté d'un utilisateur.
     */
    public function getFullHistoryForUser(User $user): array
    {
        $sessions = $this->workoutSessionRepository->findHistoryByUser($user);

        return array_map(function (WorkoutSession $session): array {
            return [
                'id' => $session->getId(),
                'performed_at' => $session->getPerformedAt()?->format(DATE_ATOM),
                'duration_seconds' => $session->getDurationSeconds() ?? 0,
                'total_volume' => $session->getTotalVolume() ?? 0,
                'total_completed_sets' => $session->getTotalCompletedSets() ?? 0,
                'routine_name' => $session->getRoutineName()
                    ?? $session->getWorkoutSchedule()?->getRoutineTemplate()?->getName()
                    ?? 'Séance',
                'routine_id' => $session->getRoutineId()
                    ?? $session->getWorkoutSchedule()?->getRoutineTemplate()?->getId(),
                'is_from_planning' => $session->getWorkoutSchedule() !== null,
            ];
        }, $sessions);
    }

    /**
     * Payload complet pour le dashboard adhérent Twig.
     */
    public function getDashboardPayload(User $user, int $rangeDays = 30): array
    {
        $stats = $this->getProgressStatsForUser($user, $rangeDays);
        $sessions = $this->getWorkoutSessionsForUser($user, $rangeDays);

        $maxVolume = 1;
        foreach ($sessions as $session) {
            $volume = (float) ($session['total_volume'] ?? 0);
            if ($volume > $maxVolume) {
                $maxVolume = $volume;
            }
        }

        $dailySessions = $this->aggregateSessionsByDay($sessions);

        $maxDailyVolume = 1;
        foreach ($dailySessions as $day) {
            $volume = (float) ($day['total_volume'] ?? 0);
            if ($volume > $maxDailyVolume) {
                $maxDailyVolume = $volume;
            }
        }

        return [
            'rangeDays' => $rangeDays,
            'rangeLabel' => $this->getRangeLabel($rangeDays),
            'stats' => $stats,
            'sessions' => $sessions,
            'maxVolume' => $maxVolume,
            'dailySessions' => $dailySessions,
            'maxDailyVolume' => $maxDailyVolume,
        ];
    }

    private function getRangeLabel(int $rangeDays): string
    {
        return match ($rangeDays) {
            7 => '7 jours',
            30 => '30 jours',
            90 => '3 mois',
            0 => 'Tout',
            default => $rangeDays . ' jours',
        };
    }

    private function aggregateSessionsByDay(array $sessions): array
    {
        $dailySessions = [];

        foreach ($sessions as $session) {
            $performedAtRaw = $session['performed_at'] ?? null;

            if (!$performedAtRaw) {
                continue;
            }

            try {
                $performedAt = new \DateTimeImmutable($performedAtRaw);
            } catch (\Exception $e) {
                continue;
            }

            $dayKey = $performedAt->format('Y-m-d');

            if (!isset($dailySessions[$dayKey])) {
                $dailySessions[$dayKey] = [
                    'performed_at' => $performedAt->setTime(0, 0)->format(DATE_ATOM),
                    'total_volume' => 0,
                    'duration_seconds' => 0,
                    'sessions_count' => 0,
                ];
            }

            $dailySessions[$dayKey]['total_volume'] += (int) ($session['total_volume'] ?? 0);
            $dailySessions[$dayKey]['duration_seconds'] += (int) ($session['duration_seconds'] ?? 0);
            $dailySessions[$dayKey]['sessions_count']++;
        }

        ksort($dailySessions);

        return array_values($dailySessions);
    }
}
