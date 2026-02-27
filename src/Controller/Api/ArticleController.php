<?php
// src/Controller/Api/ArticleController.php

namespace App\Controller\Api;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/api/actus', name: 'api_actus_list', methods: ['GET'])]
    public function getActus(ArticleRepository $articleRepository): JsonResponse
    {
        // ✅ Mieux que id : tri par date de publication
        $articles = $articleRepository->findBy([], ['publishedAt' => 'DESC'], 5);

        $data = [];

        foreach ($articles as $article) {
            $description = $article->getDescription() ?? '';
            $plainText = trim(preg_replace('/\s+/', ' ', strip_tags($description)));
            $excerpt = mb_strimwidth($plainText, 0, 140, '…');

            $data[] = [
                'id' => $article->getId(),
                'title' => $article->getTitle() ?? 'Sans titre',
                'subtitle' => $excerpt ?: 'Aucune description',
                'publishedAt' => $article->getPublishedAt()?->format(DATE_ATOM),
                'photo' => $article->getPhoto(), // optionnel (si tu veux l'afficher plus tard dans Flutter)
            ];
        }

        return $this->json($data);
    }
}
