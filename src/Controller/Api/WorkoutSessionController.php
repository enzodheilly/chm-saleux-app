<?php

namespace App\Controller\Api;

use App\Entity\WorkoutSession;
use App\Repository\UserRoutineRepository;
use App\Repository\WorkoutScheduleRepository;
use App\Repository\WorkoutSessionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/workouts')]
class WorkoutSessionController extends AbstractController
{
    #[Route('/complete', name: 'api_workout_complete', methods: ['POST'])]
    public function complete(
        Request $request,
        WorkoutSessionRepository $sessionRepo,
        WorkoutScheduleRepository $scheduleRepo,
        UserRoutineRepository $userRoutineRepo,
        EntityManagerInterface $em
    ): JsonResponse {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'User not found'], 401);
        }

        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return $this->json(['error' => 'Invalid JSON'], 400);
        }

        $session = new WorkoutSession();
        $session->setUser($user);
        $session->setDurationSeconds($data['duration_seconds'] ?? 0);
        $session->setTotalVolume($data['total_volume'] ?? 0);
        $session->setTotalCompletedSets($data['total_completed_sets'] ?? 0);
        $session->setRoutineName($data['routine_name'] ?? null);

        // ✅ On tente de lier la UserRoutine si l'id correspond
        if (!empty($data['routine_id'])) {
            $userRoutine = $userRoutineRepo->find($data['routine_id']);
            if ($userRoutine && $userRoutine->getUser() === $user) {
                $session->setUserRoutine($userRoutine);
            }
        }

        if (!empty($data['performed_at'])) {
            try {
                $session->setPerformedAt(new \DateTime($data['performed_at']));
            } catch (\Exception $e) {
                $session->setPerformedAt(new \DateTime());
            }
        } else {
            $session->setPerformedAt(new \DateTime());
        }

        // ✅ Lien avec le WorkoutSchedule si une routine template correspond
        if (!empty($data['routine_id'])) {
            $today = new \DateTime();
            $schedule = $scheduleRepo->findOneBy([
                'user' => $user,
                'routineTemplate' => $data['routine_id'],
                'scheduledDate' => new \DateTime($today->format('Y-m-d'))
            ]);

            if ($schedule) {
                $schedule->setIsCompleted(true);
                $session->setWorkoutSchedule($schedule);
                $em->persist($schedule);
            }
        }

        $sessionRepo->save($session, true);

        return $this->json([
            'message' => 'Workout saved successfully!',
            'id' => $session->getId(),
            'total_completed_sets' => $session->getTotalCompletedSets(),
        ], 201);
    }

    #[Route('/sessions', name: 'api_workout_sessions', methods: ['GET'])]
    public function sessions(Request $request, WorkoutSessionRepository $repo): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'User not found'], 401);
        }

        $range = (int)($request->query->get('range', 30));

        $qb = $repo->createQueryBuilder('ws')
            ->andWhere('ws.user = :user')
            ->setParameter('user', $user)
            ->orderBy('ws.performedAt', 'DESC');

        if ($range > 0) {
            $from = (new \DateTime())->modify("-{$range} days");
            $qb->andWhere('ws.performedAt >= :from')
                ->setParameter('from', $from);
        }

        $sessions = $qb->getQuery()->getResult();

        $data = array_map(function (WorkoutSession $s) {
            return [
                'id' => $s->getId(),
                'performed_at' => $s->getPerformedAt()?->format(DATE_ATOM),
                'duration_seconds' => $s->getDurationSeconds(),
                'total_volume' => $s->getTotalVolume(),
                'total_completed_sets' => $s->getTotalCompletedSets(),
                'routine_name' => $s->getRoutineName() ?? $s->getWorkoutSchedule()?->getRoutineTemplate()?->getName(),
                // ✅ On cherche l'id dans UserRoutine d'abord, sinon dans le schedule
                'routine_id' => $s->getUserRoutine()?->getId() ?? $s->getWorkoutSchedule()?->getRoutineTemplate()?->getId(),
                'is_from_planning' => $s->getWorkoutSchedule() !== null,
            ];
        }, $sessions);

        return $this->json($data);
    }

    #[Route('/stats', name: 'api_workout_stats', methods: ['GET'])]
    public function stats(Request $request, WorkoutSessionRepository $repo): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'User not found'], 401);
        }

        $range = (int)($request->query->get('range', 30));

        $qb = $repo->createQueryBuilder('ws')
            ->select('
                COUNT(ws.id) as sessionsCount,
                SUM(ws.totalVolume) as totalVolume,
                SUM(ws.durationSeconds) as totalDuration,
                SUM(ws.totalCompletedSets) as totalCompletedSets
            ')
            ->andWhere('ws.user = :user')
            ->setParameter('user', $user);

        if ($range > 0) {
            $from = (new \DateTime())->modify("-{$range} days");
            $qb->andWhere('ws.performedAt >= :from')
                ->setParameter('from', $from);
        }

        $result = $qb->getQuery()->getSingleResult();

        return $this->json([
            'range_days' => $range,
            'sessions' => (int)($result['sessionsCount'] ?? 0),
            'total_volume' => (float)($result['totalVolume'] ?? 0),
            'total_duration_seconds' => (int)($result['totalDuration'] ?? 0),
            'total_completed_sets' => (int)($result['totalCompletedSets'] ?? 0),
        ]);
    }
}
