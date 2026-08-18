<?php

namespace App\Controller\Admin;

use App\Repository\CheckInRepository;
use App\Service\CheckInService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion-chm-secrete-92x/frequentation', name: 'admin_attendance_')]
class AdminAttendanceController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CheckInRepository $checkInRepository): Response
    {
        $countByDay = $checkInRepository->countByDay(7);
        $countByHour = $checkInRepository->countByHourOfDay(30);
        $averageDurationSeconds = $checkInRepository->getAverageDurationSeconds(null, 30);

        return $this->render('admin/attendance/index.html.twig', [
            'currentlyIn' => $checkInRepository->countCurrentlyIn(),
            'recentCheckIns' => $checkInRepository->findRecent(15),
            'dayLabels' => array_keys($countByDay),
            'dayCounts' => array_values($countByDay),
            'hourCounts' => $countByHour,
            'averageDurationMinutes' => round($averageDurationSeconds / 60, 1),
        ]);
    }

    #[Route('/scan', name: 'scan', methods: ['POST'])]
    public function scan(Request $request, CheckInService $checkInService): JsonResponse
    {
        $data = json_decode($request->getContent(), true) ?? [];

        if (!$this->isCsrfTokenValid('attendance_scan', (string) ($data['_token'] ?? ''))) {
            return new JsonResponse(['success' => false, 'error' => 'Jeton CSRF invalide.'], JsonResponse::HTTP_FORBIDDEN);
        }

        $token = (string) ($data['token'] ?? '');

        $result = $checkInService->handleScan($token, 'entrance_scanner');

        if ($result === null) {
            return new JsonResponse(['success' => false, 'error' => 'QR code inconnu.'], JsonResponse::HTTP_NOT_FOUND);
        }

        $licence = $result['licence'];

        return new JsonResponse([
            'success' => true,
            'type' => $result['type'],
            'firstName' => $licence->getFirstName(),
            'lastName' => $licence->getLastName(),
            'scannedAt' => $result['checkIn']->getScannedAt()->format('H:i:s'),
        ]);
    }
}
