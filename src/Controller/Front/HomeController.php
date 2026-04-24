<?php

namespace App\Controller\Front;

use App\Repository\ArticleRepository;
use App\Repository\NewEquipmentRepository;
use App\Repository\MembershipPlanRepository;
use App\Repository\NewsletterSubscriberRepository;
use App\Service\MemberProgressService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        ArticleRepository $articleRepository,
        NewEquipmentRepository $newEquipmentRepository,
        MembershipPlanRepository $membershipPlanRepository,
        NewsletterSubscriberRepository $subscriberRepository,
        MemberProgressService $progressService,
        Request $request
    ): Response {
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_dashboard');
        }

        $user = $this->getUser();

        $subscriber = null;
        $isSubscribed = false;
        $heroStats = null;

        if ($user) {
            $subscriber = $subscriberRepository->findOneBy([
                'email' => $user->getEmail(),
                'isConfirmed' => true,
            ]);
            $isSubscribed = $subscriber !== null;

            // Stats des 30 derniers jours pour le hero
            $stats = $progressService->getProgressStatsForUser($user, 30);
            $sessions = $progressService->getWorkoutSessionsForUser($user, 30);

            // Calcul de la série de jours consécutifs
            $streak = $this->computeStreak($sessions);

            $heroStats = [
                'sessions' => (int) ($stats['sessions'] ?? 0),
                'volume'   => (float) ($stats['total_volume'] ?? 0),
                'duration' => (int) ($stats['total_duration_seconds'] ?? 0),
                'sets'     => (int) ($stats['total_completed_sets'] ?? 0),
                'streak'   => $streak,
            ];
        }

        return $this->render('0_home/index.html.twig', [
            'articles'             => $articleRepository->findLatest(3),
            'newEquipments'        => $newEquipmentRepository->findLatest(),
            'plans'                => $membershipPlanRepository->findBy([], ['price' => 'ASC']),
            'isSubscribed'         => $isSubscribed,
            'subscriber'           => $subscriber,
            'heroStats'            => $heroStats,
            'showSetPasswordModal' => (bool) $request->query->get('showSetPasswordModal', false),
        ]);
    }

    private function computeMembershipDuration(?\DateTimeInterface $createdAt): ?array
    {
        if (!$createdAt) {
            return null;
        }

        $now = new \DateTimeImmutable();
        $diff = $createdAt->diff($now);

        return [
            'years'  => $diff->y,
            'months' => $diff->m,
            'days'   => $diff->d,
        ];
    }

    /**
     * Calcule le nombre de jours consécutifs avec au moins une séance.
     */
    private function computeStreak(array $sessions): int
    {
        if (empty($sessions)) {
            return 0;
        }

        // On récupère les jours distincts avec une séance
        $days = [];
        foreach ($sessions as $s) {
            $raw = $s['performed_at'] ?? null;
            if (!$raw) continue;
            try {
                $days[] = (new \DateTimeImmutable($raw))->format('Y-m-d');
            } catch (\Exception) {
            }
        }

        $days = array_unique($days);
        rsort($days); // du plus récent au plus ancien

        $streak = 0;
        $check = new \DateTimeImmutable('today');

        foreach ($days as $day) {
            if ($day === $check->format('Y-m-d')) {
                $streak++;
                $check = $check->modify('-1 day');
            } else {
                break;
            }
        }

        return $streak;
    }
}
