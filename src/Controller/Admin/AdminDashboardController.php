<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\SecurityLogRepository;
use App\Repository\NewsletterSubscriberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractController
{
    #[Route('/gestion-chm-secrete-92x', name: 'admin_dashboard')]
    public function index(
        UserRepository $userRepo,
        SecurityLogRepository $logRepo,
        NewsletterSubscriberRepository $subsRepo
    ): Response {

        $user = $this->getUser();

        // 🔒 REDIRECTION DE SÉCURITÉ
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        // Si l'admin n'a pas confirmé son 2FA, on l'éjecte vers la page dédiée.
        if (!$user->isTotpConfirmed()) {
            return $this->redirectToRoute('admin_security_2fa_setup');
        }

        // =========================================================================
        // 📊 STATISTIQUES DU DASHBOARD (Exécuté seulement si admin sécurisé)
        // =========================================================================

        // Statistiques principales
        $totalUsers = $userRepo->count([]);
        $verifiedUsers = $userRepo->count(['isVerified' => true]);
        $newsletterSubscribers = $subsRepo->countConfirmed();

        // Logs sécurité
        $successfulAttempts = $logRepo->countSuccessful();
        $failedAttempts = $logRepo->countFailedSince(new \DateTimeImmutable('-24 hours'));
        $recentLogs = $logRepo->findRecent(10);

        // Connexions réussies sur 7 jours
        $successByDay = $logRepo->getSuccessCountByDay(7);
        $labels7 = array_keys($successByDay);
        $loginsSuccessByDay = array_values($successByDay);

        // Nouveaux abonnés sur 7 jours
        $subsByDay = $subsRepo->countByDay(7);
        $newSubscribersByDay = array_values($subsByDay);

        // Abonnés récents
        $recentSubscribers = $subsRepo->findRecent(5);

        // Activité simulée
        $recentActivity = [
            ['text' => 'Nouvel utilisateur <b>inscrit</b>', 'date' => new \DateTimeImmutable('-2 hours')],
            ['text' => 'Envoi d\'une newsletter test', 'date' => new \DateTimeImmutable('-1 day')],
            ['text' => 'Suppression d\'un ancien log', 'date' => new \DateTimeImmutable('-3 days')],
        ];

        return $this->render('admin/dashboard.html.twig', [
            'qrCodeContent' => null,
            'totalUsers' => $totalUsers,
            'verifiedUsers' => $verifiedUsers,
            'successfulAttempts' => $successfulAttempts,
            'failedAttempts' => $failedAttempts,
            'newsletterSubscribers' => $newsletterSubscribers,
            'recentSubscribers' => $recentSubscribers,
            'labels7' => $labels7,
            'loginsSuccessByDay' => $loginsSuccessByDay,
            'newSubscribersByDay' => $newSubscribersByDay,
            'recentAttempts' => $recentLogs,
            'recentActivity' => $recentActivity,
        ]);
    }
}
