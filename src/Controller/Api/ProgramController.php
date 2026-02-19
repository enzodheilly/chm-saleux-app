<?php

namespace App\Controller\Api;

use App\Entity\RoutineTemplate;
use App\Repository\RoutineTemplateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProgramController extends AbstractController
{
    // --- 1. LISTE DE TOUS LES PROGRAMMES ---
    #[Route('/api/programs', name: 'api_programs_list', methods: ['GET'])]
    public function list(RoutineTemplateRepository $repository, SerializerInterface $serializer): JsonResponse
    {
        $programs = $repository->findAll();
        $json = $serializer->serialize($programs, 'json', ['groups' => 'template:read']);
        return new JsonResponse($json, 200, [], true);
    }

    // ✅ 2. DÉTAILS D'UN PROGRAMME PRÉCIS (Celle qui manquait pour le Player !)
    #[Route('/api/programs/{id}', name: 'api_program_show', methods: ['GET'])]
    public function show(RoutineTemplate $program, SerializerInterface $serializer): JsonResponse
    {
        // On utilise 'template:read' pour inclure les 'templateExercises'
        $json = $serializer->serialize($program, 'json', ['groups' => 'template:read']);

        return new JsonResponse($json, 200, [], true);
    }
}
