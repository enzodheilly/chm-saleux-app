<?php

namespace App\Controller\Front;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\ArticleCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

        // --- Filtres ---
        $rawCategory = trim($request->query->getString('category', ''));
        $rawCategory = $rawCategory !== '' ? $rawCategory : null;

        $dateFrom = $this->parseDateOrNull($request->query->getString('date_from', ''));
        $dateTo   = $this->parseDateOrNull($request->query->getString('date_to', ''));

        // Si les dates sont inversées, on les swap
        if ($dateFrom && $dateTo && $dateFrom > $dateTo) {
            [$dateFrom, $dateTo] = [$dateTo, $dateFrom];
        }

        // --- Articles filtrés ---
        $result = $articleRepository->findFilteredArticles(
            $rawCategory,
            $dateFrom,
            $dateTo,
            $page,
            $limit
        );

        $articles = $result['data'] ?? [];
        $totalArticles = (int) ($result['total'] ?? 0);
        $totalPages = max(1, (int) ceil($totalArticles / $limit));

        if ($page > $totalPages) {
            $page = $totalPages;
        }

        // --- Toutes les catégories ---
        $categories = $articleCategoryRepository->findUsedCategories();

        $viewData = [
            'articles' => $articles,
            'page' => $page,
            'totalPages' => $totalPages,
            'filters' => [
                'category' => $rawCategory,
                'date_from' => $dateFrom?->format('Y-m-d'),
                'date_to' => $dateTo?->format('Y-m-d'),
            ],
        ];

        // Si appel AJAX : on renvoie uniquement le bloc résultats
        if ($request->isXmlHttpRequest()) {
            return $this->render('1_accueil/section4/actualites/_results.html.twig', $viewData);
        }

        // Sinon : page complète
        return $this->render('1_accueil/section4/actualites/articles.html.twig', array_merge($viewData, [
            'categories' => $categories,
        ]));
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

        $date = \DateTimeImmutable::createFromFormat('!Y-m-d', $value);

        return $date ?: null;
    }
}
