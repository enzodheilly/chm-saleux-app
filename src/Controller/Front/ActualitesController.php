<?php

namespace App\Controller\Front;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\ArticleCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ActualitesController extends AbstractController
{
    #[Route('/actualites/{page<\d+>?1}', name: 'actualites')]
    public function index(
        Request $request,
        ArticleRepository $articleRepository,
        ArticleCategoryRepository $articleCategoryRepository,
        int $page = 1
    ): Response {
        $limit = 18;
        $page = max(1, $page);

        // --- Filters (sanitize) ---
        $rawCategory = $request->query->getString('category', '');
        $rawCategory = trim($rawCategory);
        $rawCategory = $rawCategory !== '' ? $rawCategory : null;

        $dateFrom = $this->parseDateOrNull($request->query->getString('date_from', ''));
        $dateTo   = $this->parseDateOrNull($request->query->getString('date_to', ''));

        // Si l'utilisateur inverse les dates, on swap (évite des filtres "impossibles")
        if ($dateFrom && $dateTo && $dateFrom > $dateTo) {
            [$dateFrom, $dateTo] = [$dateTo, $dateFrom];
        }

        // --- Fetch filtered articles ---
        $result = $articleRepository->findFilteredArticles(
            $rawCategory,     // filtre par nom (string) OU null
            $dateFrom,        // DateTimeImmutable|null
            $dateTo,          // DateTimeImmutable|null
            $page,
            $limit
        );

        $articles = $result['data'] ?? [];
        $totalArticles = (int) ($result['total'] ?? 0);
        $totalPages = max(1, (int) ceil($totalArticles / $limit));

        // Si quelqu'un tape /actualites/9999 alors qu'il n'y a que 3 pages
        if ($page > $totalPages) {
            $page = $totalPages;
        }

        // --- Fetch all categories (clean) ---
        $categories = $articleCategoryRepository->findBy([], ['name' => 'ASC']);

        return $this->render('1_accueil/section4/actualites/articles.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
            'page' => $page,
            'totalPages' => $totalPages,
            'filters' => [
                'category' => $rawCategory,
                'date_from' => $dateFrom?->format('Y-m-d'),
                'date_to' => $dateTo?->format('Y-m-d'),
            ],
        ]);
    }

    #[Route('/article/{id}', name: 'article_show')]
    public function show(Article $article): Response
    {
        return $this->render('1_accueil/section4/actualites/showarticles.html.twig', [
            'article' => $article,
        ]);
    }

    private function parseDateOrNull(string $value): ?\DateTimeImmutable
    {
        $value = trim($value);
        if ($value === '') {
            return null;
        }

        // supporte "YYYY-MM-DD"
        $date = \DateTimeImmutable::createFromFormat('Y-m-d', $value);

        return $date ?: null;
    }
}
