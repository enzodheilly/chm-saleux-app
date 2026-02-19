<?php

namespace App\Controller\Api;

use App\Entity\WorkoutSession;
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
        EntityManagerInterface $em
    ): JsonResponse {
        // 1. On récupère l'utilisateur connecté (via le Token JWT)
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'User not found'], 401);
        }

        // 2. On décode le JSON envoyé par Flutter
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return $this->json(['error' => 'Invalid JSON'], 400);
        }

        // 3. On crée la nouvelle Session (L'historique)
        $session = new WorkoutSession();
        $session->setUser($user);
        $session->setDurationSeconds($data['duration_seconds'] ?? 0);
        $session->setTotalVolume($data['total_volume'] ?? 0);

        // Gestion de la date (si envoyée, sinon maintenant)
        if (!empty($data['performed_at'])) {
            try {
                $session->setPerformedAt(new \DateTime($data['performed_at']));
            } catch (\Exception $e) {
                $session->setPerformedAt(new \DateTime());
            }
        } else {
            $session->setPerformedAt(new \DateTime());
        }

        // 4. Si c'était une séance du planning, on la marque comme "Fait"
        // (On cherche si une routine était prévue aujourd'hui ou via l'ID envoyé)
        if (!empty($data['routine_id'])) {
            // On cherche la séance prévue la plus pertinente (ex: aujourd'hui avec ce template)
            // Note: Ici tu pourras affiner la logique si tu envoies l'ID exact du schedule
            // Pour l'instant, on cherche si l'user avait prévu cette routine ce jour-là
            $today = new \DateTime();
            $schedule = $scheduleRepo->findOneBy([
                'user' => $user,
                'routineTemplate' => $data['routine_id'],
                'scheduledDate' => new \DateTime($today->format('Y-m-d')) // Date du jour sans l'heure
            ]);

            if ($schedule) {
                $schedule->setIsCompleted(true);
                $session->setWorkoutSchedule($schedule); // On lie les deux
                $em->persist($schedule); // On prépare la mise à jour
            }
        }

        // 5. On sauvegarde tout
        $sessionRepo->save($session, true); // Le 'true' fait le flush()

        return $this->json([
            'message' => 'Workout saved successfully!',
            'id' => $session->getId()
        ], 201);
    }

    #[Route('/sessions', name: 'api_workout_sessions', methods: ['GET'])]
    public function sessions(Request $request, WorkoutSessionRepository $repo): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'User not found'], 401);
        }

        $range = (int)($request->query->get('range', 30)); // 7 / 30 / 90 / 0(all)

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

        // ✅ Réponse simple et clean pour Flutter
        $data = array_map(function (WorkoutSession $s) {
            return [
                'id' => $s->getId(),
                'performed_at' => $s->getPerformedAt()?->format(DATE_ATOM),
                'duration_seconds' => $s->getDurationSeconds(),
                'total_volume' => $s->getTotalVolume(),
                'routine_name' => $s->getWorkoutSchedule()?->getRoutineTemplate()?->getName(), // si dispo
                'routine_id' => $s->getWorkoutSchedule()?->getRoutineTemplate()?->getId(),
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

        $range = (int)($request->query->get('range', 30)); // 7 / 30 / 90 / 0(all)

        $qb = $repo->createQueryBuilder('ws')
            ->select('COUNT(ws.id) as sessionsCount, SUM(ws.totalVolume) as totalVolume, SUM(ws.durationSeconds) as totalDuration')
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
        ]);
    }
}
