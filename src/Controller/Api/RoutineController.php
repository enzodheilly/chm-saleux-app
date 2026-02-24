<?php

namespace App\Controller\Api;

use App\Entity\UserRoutine;
use App\Entity\UserRoutineExercise;
use App\Repository\ExerciseRepository;
use App\Repository\UserRoutineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RoutineController extends AbstractController
{
    #[Route('/api/exercises', name: 'api_exercises_index', methods: ['GET'])]
    public function getAllExercises(ExerciseRepository $exerciseRepository): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        $exercises = $exerciseRepository->findBy([], ['name' => 'ASC']);

        $data = [];
        foreach ($exercises as $exercise) {
            $muscleGroup = 'Autre';

            if (method_exists($exercise, 'getMuscleGroup') && $exercise->getMuscleGroup()) {
                $mg = $exercise->getMuscleGroup();

                // Si c'est une string
                if (is_string($mg)) {
                    $muscleGroup = $mg;
                }
                // Si c'est une entité/category avec getName()
                elseif (is_object($mg) && method_exists($mg, 'getName')) {
                    $muscleGroup = (string) $mg->getName();
                }
            } elseif (method_exists($exercise, 'getCategory') && $exercise->getCategory()) {
                $cat = $exercise->getCategory();
                if (is_string($cat)) {
                    $muscleGroup = $cat;
                } elseif (is_object($cat) && method_exists($cat, 'getName')) {
                    $muscleGroup = (string) $cat->getName();
                }
            }

            $data[] = [
                'id' => $exercise->getId(),
                'name' => $exercise->getName(),
                'muscleGroup' => $muscleGroup,
            ];
        }

        return $this->json($data, 200);
    }

    #[Route('/api/custom-routines/me', name: 'api_custom_routines_me', methods: ['GET'])]
    public function getMyCustomRoutines(UserRoutineRepository $userRoutineRepository): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        $routines = $userRoutineRepository->findByUserOrdered($user);

        $data = [];

        foreach ($routines as $routine) {
            $items = [];

            foreach ($routine->getRoutineExercises() as $item) {
                $exercise = $item->getExercise();
                if (!$exercise) {
                    continue;
                }

                $items[] = [
                    'id' => $item->getId(),
                    'order' => $item->getExerciseOrder(),
                    'name' => $exercise->getName(),
                    'sets' => $item->getSets(),
                    'reps' => $item->getReps(),
                    'restSec' => $item->getRestSec(),
                ];
            }

            $data[] = [
                'id' => $routine->getId(),
                'name' => $routine->getName(),
                'estimatedDurationMin' => $routine->getEstimatedDurationMin() ?? (max(1, count($items)) * 8),
                'exercises' => $items,
                'createdAt' => $routine->getCreatedAt()?->format(DATE_ATOM),
            ];
        }

        return $this->json($data, 200);
    }

    #[Route('/api/custom-routines', name: 'api_custom_routines_create', methods: ['POST'])]
    public function createCustomRoutine(
        Request $request,
        EntityManagerInterface $em,
        ExerciseRepository $exerciseRepository
    ): JsonResponse {
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        $payload = json_decode($request->getContent(), true);

        if (!is_array($payload)) {
            return new JsonResponse(['error' => 'JSON invalide'], 400);
        }

        $name = trim((string)($payload['name'] ?? ''));
        $exercises = $payload['exercises'] ?? [];

        if ($name === '') {
            return new JsonResponse(['error' => 'Le nom de la routine est requis'], 422);
        }

        if (!is_array($exercises) || count($exercises) === 0) {
            return new JsonResponse(['error' => 'Ajoute au moins un exercice'], 422);
        }

        $routine = new UserRoutine();
        $routine->setUser($user);
        $routine->setName($name);
        $routine->setCreatedAt(new \DateTimeImmutable());
        $routine->setEstimatedDurationMin(count($exercises) * 8);

        $em->persist($routine);

        foreach ($exercises as $index => $row) {
            if (!is_array($row)) {
                continue;
            }

            $exerciseId = (int)($row['exerciseId'] ?? 0);
            $order = max(1, (int)($row['order'] ?? ($index + 1)));
            $sets = max(1, (int)($row['sets'] ?? 3));
            $reps = max(1, (int)($row['reps'] ?? 10));
            $restSec = max(0, (int)($row['restSec'] ?? 60));

            $exercise = $exerciseRepository->find($exerciseId);
            if (!$exercise) {
                return new JsonResponse([
                    'error' => "Exercice introuvable (id: {$exerciseId})"
                ], 404);
            }

            $item = new UserRoutineExercise();
            $item->setRoutine($routine);
            $item->setExercise($exercise);
            $item->setExerciseOrder($order);
            $item->setSets($sets);
            $item->setReps($reps);
            $item->setRestSec($restSec);

            $em->persist($item);
            $routine->addRoutineExercise($item);
        }

        $em->flush();

        return $this->json([
            'message' => 'Routine créée avec succès',
            'id' => $routine->getId(),
            'name' => $routine->getName(),
        ], 201);
    }
}
