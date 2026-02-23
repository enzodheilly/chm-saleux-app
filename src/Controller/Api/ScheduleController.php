<?php

namespace App\Controller\Api;

use App\Entity\WorkoutSchedule;
use App\Repository\RoutineTemplateRepository;
use App\Repository\WorkoutScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/schedule')]
class ScheduleController extends AbstractController
{
    // 1. AJOUTER UNE SÉANCE AU CALENDRIER
    #[Route('/add', methods: ['POST'])]
    public function add(
        Request $request,
        RoutineTemplateRepository $routineRepo,
        EntityManagerInterface $em
    ): JsonResponse {
        $user = $this->getUser(); // Récupéré grâce au Token JWT
        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], 401);
        }

        $data = json_decode($request->getContent(), true);

        // On attend : { "routine_id": 12, "date": "2024-05-20" }
        $routineId = $data['routine_id'] ?? null;
        $dateString = $data['date'] ?? null;

        if (!$routineId || !$dateString) {
            return new JsonResponse(['error' => 'Missing data'], 400);
        }

        $routine = $routineRepo->find($routineId);
        if (!$routine) {
            return new JsonResponse(['error' => 'Routine not found'], 404);
        }

        $schedule = new WorkoutSchedule();
        $schedule->setUser($user);
        $schedule->setRoutineTemplate($routine);
        $schedule->setScheduledDate(new \DateTime($dateString));
        $schedule->setIsCompleted(false);

        $em->persist($schedule);
        $em->flush();

        return new JsonResponse(['message' => 'Séance programmée avec succès !'], 201);
    }

    // 2. RÉCUPÉRER LE PLANNING (Version sécurisée sans Erreur 500)
    #[Route('/my-week', methods: ['GET'])]
    public function getMyWeek(WorkoutScheduleRepository $repo): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], 401);
        }

        // Récupère les séances de l'utilisateur
        $schedules = $repo->findBy(['user' => $user], ['scheduledDate' => 'ASC']);

        $data = [];
        foreach ($schedules as $s) {
            $data[] = [
                'id' => $s->getId(),
                'scheduledDate' => $s->getScheduledDate() ? $s->getScheduledDate()->format('Y-m-d') : null,
                'isCompleted' => $s->isCompleted(),
                'routineTemplate' => [
                    'id' => $s->getRoutineTemplate()->getId(),
                    'name' => $s->getRoutineTemplate()->getName(),
                    'muscleGroup' => $s->getRoutineTemplate()->getMuscleGroup(),
                    'estimatedDurationMin' => $s->getRoutineTemplate()->getEstimatedDurationMin(),
                ]
            ];
        }

        return new JsonResponse($data, 200);
    }
}
