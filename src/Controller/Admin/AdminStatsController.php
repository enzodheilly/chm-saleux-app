<?php
// src/Controller/Admin/AdminStatsController.php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use App\Repository\ArticleRepository;
use App\Repository\NewsletterSubscriberRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/stats', name: 'admin_stats_')]
class AdminStatsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(
        UserRepository $userRepo,
        ArticleRepository $articleRepo,
        NewsletterSubscriberRepository $subsRepo,
        EntityManagerInterface $em
    ): Response {
        // 🔢 Global stats
        $totalUsers = $userRepo->count([]);
        $totalArticles = $articleRepo->count([]);
        $newsletterSubscribers = $subsRepo->countConfirmed();

        // 🕒 Last 7 days
        $labels = [];
        $userRegistrations = [];
        $articlesPublished = [];

        $today = new \DateTimeImmutable();
        for ($i = 6; $i >= 0; $i--) {
            $day = $today->modify("-$i days");
            $labels[] = $day->format('D'); // Mon, Tue...

            $countUsers = $userRepo->createQueryBuilder('u')
                ->select('COUNT(u.id)')
                ->where('u.createdAt BETWEEN :start AND :end')
                ->setParameter('start', $day->setTime(0, 0))
                ->setParameter('end', $day->setTime(23, 59, 59))
                ->getQuery()
                ->getSingleScalarResult();

            $userRegistrations[] = (int) $countUsers;

            $countArticles = $articleRepo->createQueryBuilder('a')
                ->select('COUNT(a.id)')
                ->where('a.publishedAt BETWEEN :start AND :end')
                ->setParameter('start', $day->setTime(0, 0))
                ->setParameter('end', $day->setTime(23, 59, 59))
                ->getQuery()
                ->getSingleScalarResult();

            $articlesPublished[] = (int) $countArticles;
        }

        return $this->render('admin/stats/index.html.twig', [
            'title' => 'Statistiques du site',
            'totalUsers' => $totalUsers,
            'totalArticles' => $totalArticles,
            'newsletterSubscribers' => $newsletterSubscribers,
            'labels' => $labels,
            'userRegistrations' => $userRegistrations,
            'articlesPublished' => $articlesPublished,
        ]);
    }
}
