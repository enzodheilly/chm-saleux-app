<?php

namespace App\Controller\Api;

use App\Repository\CheckInRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AttendanceController extends AbstractController
{
    /**
     * Nombre d'adhérents actuellement présents dans la salle (affiché en temps réel sur l'app mobile).
     */
    #[Route('/api/attendance/current', name: 'api_attendance_current', methods: ['GET'])]
    public function current(CheckInRepository $checkInRepository): JsonResponse
    {
        return new JsonResponse([
            'count' => $checkInRepository->countCurrentlyIn(),
        ]);
    }

    /**
     * Nombre d'entrées par heure aujourd'hui (graphique de fréquentation en direct sur l'app mobile).
     */
    #[Route('/api/attendance/hourly', name: 'api_attendance_hourly', methods: ['GET'])]
    public function hourly(CheckInRepository $checkInRepository): JsonResponse
    {
        return new JsonResponse([
            'hourly' => $checkInRepository->countTodayByHour(),
        ]);
    }
}
