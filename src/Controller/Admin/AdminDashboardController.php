<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\NewsletterSubscriberRepository;
use App\Repository\SecurityLogRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_STAFF')]
class AdminDashboardController extends AbstractController
{
    #[Route('/gestion-chm-secrete-92x', name: 'admin_dashboard')]
    public function index(
        UserRepository $userRepo,
        SecurityLogRepository $logRepo,
        NewsletterSubscriberRepository $subsRepo
    ): Response {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        if (!$user->isTotpConfirmed()) {
            return $this->redirectToRoute('admin_security_2fa_setup');
        }

        $now24h = new \DateTimeImmutable('-24 hours');

        // --- KPIs ---
        $totalUsers          = $userRepo->count([]);
        $verifiedUsers       = $userRepo->count(['isVerified' => true]);
        $newsletterSubs      = $subsRepo->countConfirmed();
        $successLast24h      = $logRepo->countSince('Connexion', true, $now24h);
        $failsLast24h        = $logRepo->countSince('Connexion', false, $now24h);
        $adminActionsLast24h = $logRepo->countSince('Admin', null, $now24h);

        // --- Graphique linéaire — multi-périodes (7 / 14 / 30 jours) ---
        $lineData = [];
        foreach ([7, 14, 30] as $days) {
            $succ = $logRepo->getLogsByDayAndSuccess($days, true);
            $fail = $logRepo->getLogsByDayAndSuccess($days, false);
            $lineData["d{$days}"] = [
                'labels'  => array_keys($succ),
                'success' => array_values($succ),
                'fails'   => array_values($fail),
            ];
        }

        // --- Donut — répartition des types de logs (tout) ---
        $donutData = [
            'labels' => ['Connexions', 'Échecs', 'Admin', 'Sécurité', 'Session'],
            'values' => [
                $logRepo->countByTypeAndSuccess('Connexion', true),
                $logRepo->countByTypeAndSuccess('Connexion', false),
                $logRepo->countByTypeAndSuccess('Admin'),
                $logRepo->countByTypeAndSuccess('Sécurité'),
                $logRepo->countByTypeAndSuccess('Session'),
            ],
        ];

        // --- Newsletter bar chart ---
        $subsByDay = $subsRepo->countByDay(30);
        $newsletterChartData = [
            'labels' => array_keys($subsByDay),
            'values' => array_values($subsByDay),
        ];

        // --- Distribution OS ---
        $osData = $logRepo->getOsDistribution();

        // --- Activité par heure (30 jours) ---
        $hourlyRaw = $logRepo->getLoginsByHour(30);
        $hourlyData = [
            'labels'  => array_map(fn(int $h) => sprintf('%02dh', $h), range(0, 23)),
            'success' => $hourlyRaw['success'],
            'fails'   => $hourlyRaw['fails'],
        ];

        // --- Derniers logs sécurité (10) ---
        $recentLogs = $logRepo->findRecent(10);

        // --- Dernières actions admin (8) ---
        $recentAdminLogs = $logRepo->findFiltered('admin', 8);

        return $this->render('admin/dashboard.html.twig', [
            // KPIs
            'totalUsers'          => $totalUsers,
            'verifiedUsers'       => $verifiedUsers,
            'newsletterSubs'      => $newsletterSubs,
            'successLast24h'      => $successLast24h,
            'failsLast24h'        => $failsLast24h,
            'adminActionsLast24h' => $adminActionsLast24h,
            // Charts
            'lineData'            => $lineData,
            'donutData'           => $donutData,
            'newsletterChartData' => $newsletterChartData,
            'hourlyData'          => $hourlyData,
            'osData'              => $osData,
            // Tables
            'recentLogs'          => $recentLogs,
            'recentAdminLogs'     => $recentAdminLogs,
        ]);
    }
}
