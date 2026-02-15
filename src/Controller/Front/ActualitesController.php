<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;
use App\Entity\Article;

class ActualitesController extends AbstractController
{
    #[Route('/actualites/{page<\d+>?1}', name: 'actualites')]
    public function index(Request $request, ArticleRepository $articleRepository, int $page = 1): Response
    {
        $limit = 18;

        // --- Récupération des filtres depuis la requête ---
        $rawCategorie = $request->query->get('categorie');
        $dateFrom = $request->query->get('date_from');
        $dateTo = $request->query->get('date_to');

        // --- Récupération des articles filtrés ---
        $result = $articleRepository->findFilteredArticles(
            $rawCategorie,  // on filtre directement par string
            $dateFrom,
            $dateTo,
            $page,
            $limit
        );

        $articles = $result['data'];
        $totalArticles = $result['total'];
        $totalPages = max(1, ceil($totalArticles / $limit));

        // --- Récupération de tous les hashtags depuis tous les articles ---
        $allHashtags = array_map(
            fn(Article $a) => $a->getCategorie(),
            $articleRepository->findAll()
        );

        $uniqueHashtags = array_values(array_unique(array_filter($allHashtags, fn($c) => str_starts_with($c, '#'))));

        return $this->render('1_accueil/section4/actualites/articles.html.twig', [
            'articles' => $articles,
            'categories' => $uniqueHashtags,  // ✅ tout est string
            'page' => $page,
            'totalPages' => $totalPages,
            'filters' => [
                'categorie' => $rawCategorie,
                'date_from' => $dateFrom,
                'date_to' => $dateTo,
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
}
