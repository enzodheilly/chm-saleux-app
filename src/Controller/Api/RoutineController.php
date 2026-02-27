<?php

namespace App\Controller\Api;

use App\Entity\UserRoutine;
use App\Entity\UserRoutineExercise;
// 👇 Make sure this is imported!
use App\Repository\RoutineTemplateRepository;
use App\Repository\ExerciseRepository;
use App\Repository\UserRoutineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RoutineController extends AbstractController
{
    // ==========================================
    // 🆕 NOUVELLE ROUTE : CATALOGUE DES PROGRAMMES
    // ==========================================
    #[Route('/api/programs', name: 'api_programs_index', methods: ['GET'])]
    public function getRoutineTemplates(
        RoutineTemplateRepository $routineTemplateRepository
    ): JsonResponse {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        // Récupère uniquement les templates publiés
        $templates = $routineTemplateRepository->findBy(['isPublished' => true]);

        $data = [];
        foreach ($templates as $template) {

            $items = [];
            if (method_exists($template, 'getTemplateExercises')) {
                foreach ($template->getTemplateExercises() as $item) {
                    $exercise = $item->getExercise();
                    if (!$exercise) continue;

                    $items[] = [
                        'id' => $item->getId(),
                        'exerciseId' => $exercise->getId(),
                        'name' => $exercise->getName(),
                        'muscleGroup' => $this->resolveExerciseMuscleGroup($exercise),
                        'sets' => method_exists($item, 'getSets') ? $item->getSets() : 4,
                        'reps' => method_exists($item, 'getReps') ? $item->getReps() : 12,
                        'restSec' => method_exists($item, 'getRestSec') ? $item->getRestSec() : 60,
                    ];
                }
            }

            $data[] = [
                'id' => $template->getId(),
                'name' => $template->getName(),
                'goal' => $template->getGoal(),
                'level' => $template->getLevel(),
                'muscleGroup' => $template->getMuscleGroup(),
                'estimatedDurationMin' => $template->getEstimatedDurationMin(),
                // ✅ plus de "imageUrl"
                'exerciseCount' => count($items),
                'exercises' => $items,
            ];
        }

        return $this->json($data, 200);
    }

    // ==========================================
    // ANCIENNES ROUTES INCHANGÉES
    // ==========================================

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
            $data[] = [
                'id' => $exercise->getId(),
                'name' => $exercise->getName(),
                'muscleGroup' => $this->resolveExerciseMuscleGroup($exercise),
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
            $data[] = $this->serializeRoutine($routine);
        }

        return $this->json($data, 200);
    }

    #[Route('/api/custom-routines/{id}', name: 'api_custom_routines_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function getCustomRoutineDetails(
        int $id,
        UserRoutineRepository $userRoutineRepository
    ): JsonResponse {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        $routine = $userRoutineRepository->find($id);
        if (!$routine) {
            return new JsonResponse(['error' => 'Routine introuvable'], 404);
        }

        if (!$this->isOwner($routine, $user)) {
            return new JsonResponse(['error' => 'Accès refusé'], 403);
        }

        return $this->json($this->serializeRoutine($routine), 200);
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

        $error = $this->attachExercisesToRoutine($routine, $exercises, $exerciseRepository, $em);
        if ($error instanceof JsonResponse) {
            return $error;
        }

        $em->flush();

        return $this->json([
            'message' => 'Routine créée avec succès',
            'id' => $routine->getId(),
            'name' => $routine->getName(),
            'exerciseCount' => count($routine->getRoutineExercises()),
        ], 201);
    }

    #[Route('/api/custom-routines/{id}', name: 'api_custom_routines_update', methods: ['PUT', 'PATCH'], requirements: ['id' => '\d+'])]
    public function updateCustomRoutine(
        int $id,
        Request $request,
        EntityManagerInterface $em,
        ExerciseRepository $exerciseRepository,
        UserRoutineRepository $userRoutineRepository
    ): JsonResponse {
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        $routine = $userRoutineRepository->find($id);
        if (!$routine) {
            return new JsonResponse(['error' => 'Routine introuvable'], 404);
        }

        if (!$this->isOwner($routine, $user)) {
            return new JsonResponse(['error' => 'Accès refusé'], 403);
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

        // Supprime les anciens exos de la routine
        foreach (iterator_to_array($routine->getRoutineExercises()) as $existingItem) {
            if (method_exists($routine, 'removeRoutineExercise')) {
                $routine->removeRoutineExercise($existingItem);
            }
            $em->remove($existingItem);
        }

        $routine->setName($name);
        $routine->setEstimatedDurationMin(count($exercises) * 8);

        $error = $this->attachExercisesToRoutine($routine, $exercises, $exerciseRepository, $em);
        if ($error instanceof JsonResponse) {
            return $error;
        }

        $em->flush();

        return $this->json([
            'message' => 'Routine modifiée avec succès',
            'id' => $routine->getId(),
            'name' => $routine->getName(),
            'exerciseCount' => count($routine->getRoutineExercises()),
        ], 200);
    }

    #[Route('/api/custom-routines/{id}', name: 'api_custom_routines_delete', methods: ['DELETE'], requirements: ['id' => '\d+'])]
    public function deleteCustomRoutine(
        int $id,
        EntityManagerInterface $em,
        UserRoutineRepository $userRoutineRepository
    ): JsonResponse {
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        $routine = $userRoutineRepository->find($id);
        if (!$routine) {
            return new JsonResponse(['error' => 'Routine introuvable'], 404);
        }

        if (!$this->isOwner($routine, $user)) {
            return new JsonResponse(['error' => 'Accès refusé'], 403);
        }

        // Supprime les items (sécurité si pas de orphanRemoval)
        foreach (iterator_to_array($routine->getRoutineExercises()) as $item) {
            if (method_exists($routine, 'removeRoutineExercise')) {
                $routine->removeRoutineExercise($item);
            }
            $em->remove($item);
        }

        $em->remove($routine);
        $em->flush();

        return $this->json([
            'message' => 'Routine supprimée avec succès',
            'id' => $id,
        ], 200);
    }

    #[Route('/api/custom-routines/{id}/duplicate', name: 'api_custom_routines_duplicate', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function duplicateCustomRoutine(
        int $id,
        EntityManagerInterface $em,
        UserRoutineRepository $userRoutineRepository
    ): JsonResponse {
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        $source = $userRoutineRepository->find($id);
        if (!$source) {
            return new JsonResponse(['error' => 'Routine introuvable'], 404);
        }

        if (!$this->isOwner($source, $user)) {
            return new JsonResponse(['error' => 'Accès refusé'], 403);
        }

        $copy = new UserRoutine();
        $copy->setUser($user);
        $copy->setName($this->buildDuplicateName($source->getName()));
        $copy->setCreatedAt(new \DateTimeImmutable());
        $copy->setEstimatedDurationMin($source->getEstimatedDurationMin());

        $em->persist($copy);

        foreach ($source->getRoutineExercises() as $sourceItem) {
            $exercise = $sourceItem->getExercise();
            if (!$exercise) {
                continue;
            }

            $item = new UserRoutineExercise();
            $item->setRoutine($copy);
            $item->setExercise($exercise);
            $item->setExerciseOrder((int) $sourceItem->getExerciseOrder());
            $item->setSets((int) $sourceItem->getSets());
            $item->setReps((int) $sourceItem->getReps());
            $item->setRestSec((int) $sourceItem->getRestSec());

            $em->persist($item);
            if (method_exists($copy, 'addRoutineExercise')) {
                $copy->addRoutineExercise($item);
            }
        }

        // Si la durée n'existe pas/est nulle, fallback
        if (!$copy->getEstimatedDurationMin()) {
            $copy->setEstimatedDurationMin(max(1, count($copy->getRoutineExercises())) * 8);
        }

        $em->flush();

        return $this->json([
            'message' => 'Routine dupliquée avec succès',
            'id' => $copy->getId(),
            'name' => $copy->getName(),
            'exerciseCount' => count($copy->getRoutineExercises()),
        ], 201);
    }

    // =========================
    // Helpers privés
    // =========================

    private function isOwner(UserRoutine $routine, mixed $user): bool
    {
        $owner = $routine->getUser();
        if (!$owner || !$user) {
            return false;
        }

        if (!method_exists($owner, 'getId') || !method_exists($user, 'getId')) {
            return false;
        }

        return (int) $owner->getId() === (int) $user->getId();
    }

    private function buildDuplicateName(string $originalName): string
    {
        $name = trim($originalName);
        if ($name === '') {
            $name = 'Routine';
        }

        // Evite " (copie) (copie)" en boucle
        if (preg_match('/\s+\(copie(?:\s+\d+)?\)$/i', $name)) {
            return $name . ' 2';
        }

        return $name . ' (copie)';
    }

    private function attachExercisesToRoutine(
        UserRoutine $routine,
        array $rows,
        ExerciseRepository $exerciseRepository,
        EntityManagerInterface $em
    ): ?JsonResponse {
        foreach ($rows as $index => $row) {
            if (!is_array($row)) {
                return new JsonResponse([
                    'error' => "Format exercice invalide à l'index {$index}"
                ], 422);
            }

            $exerciseId = (int)($row['exerciseId'] ?? 0);
            $order = max(1, (int)($row['order'] ?? ($index + 1)));
            $sets = max(1, (int)($row['sets'] ?? 3));
            $reps = max(1, (int)($row['reps'] ?? 10));
            $restSec = max(0, (int)($row['restSec'] ?? 60));

            if ($exerciseId <= 0) {
                return new JsonResponse([
                    'error' => "exerciseId manquant ou invalide à l'index {$index}"
                ], 422);
            }

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

            if (method_exists($routine, 'addRoutineExercise')) {
                $routine->addRoutineExercise($item);
            }
        }

        return null;
    }

    private function serializeRoutine(UserRoutine $routine): array
    {
        $items = [];

        foreach ($routine->getRoutineExercises() as $item) {
            $exercise = $item->getExercise();
            if (!$exercise) {
                continue;
            }

            $items[] = [
                'id' => $item->getId(),
                'exerciseId' => $exercise->getId(),
                'order' => $item->getExerciseOrder(),
                'name' => $exercise->getName(),
                'muscleGroup' => $this->resolveExerciseMuscleGroup($exercise),
                'sets' => $item->getSets(),
                'reps' => $item->getReps(),
                'restSec' => $item->getRestSec(),
            ];
        }

        usort($items, static function (array $a, array $b): int {
            return ((int) ($a['order'] ?? 0)) <=> ((int) ($b['order'] ?? 0));
        });

        return [
            'id' => $routine->getId(),
            'name' => $routine->getName(),
            'estimatedDurationMin' => $routine->getEstimatedDurationMin() ?? (max(1, count($items)) * 8),
            'exerciseCount' => count($items),
            'exercises' => $items,
            'createdAt' => $routine->getCreatedAt()?->format(DATE_ATOM),
        ];
    }

    private function resolveExerciseMuscleGroup(object $exercise): string
    {
        $muscleGroup = 'Autre';

        if (method_exists($exercise, 'getMuscleGroup') && $exercise->getMuscleGroup()) {
            $mg = $exercise->getMuscleGroup();

            if (is_string($mg)) {
                $muscleGroup = $mg;
            } elseif (is_object($mg) && method_exists($mg, 'getName')) {
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

        return $muscleGroup;
    }
}
