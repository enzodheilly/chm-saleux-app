<?php

namespace App\Controller\Api;

use App\Repository\UserRoutineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class RoutineController extends AbstractController
{
    #[Route('/api/my-routine/today', name: 'api_routine_today', methods: ['GET'])]
    public function getTodayRoutine(UserRoutineRepository $repository, SerializerInterface $serializer): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        // On récupère le jour actuel en anglais (ex: "Friday")
        $today = (new \DateTime())->format('l');

        // On cherche la routine de l'utilisateur pour ce jour précis
        $routine = $repository->findOneBy([
            'user' => $user,
            'dayOfWeek' => $today
        ]);

        if (!$routine) {
            return new JsonResponse(['message' => 'Repos aujourd\'hui !'], 200);
        }

        $json = $serializer->serialize($routine, 'json', ['groups' => 'routine:read']);
        return new JsonResponse($json, 200, [], true);
    }
}
