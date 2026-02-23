<?php
// src/Controller/Api/ArticleController.php

namespace App\Controller\Api;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/api/actus', name: 'api_actus_list', methods: ['GET'])]
    public function getActus(ArticleRepository $articleRepository): JsonResponse
    {
        // Récupère les 5 derniers articles (triés par ID décroissant pour avoir les plus récents)
        // Si tu as un champ date, tu peux remplacer 'id' par 'createdAt'
        $articles = $articleRepository->findBy([], ['id' => 'DESC'], 5);

        $data = [];
        foreach ($articles as $article) {
            $data[] = [
                'id' => $article->getId(),
                // ⚠️ Attention : adapte les "get..." selon les noms exacts des propriétés dans ton entité Article
                'title' => $article->getTitre(), // ou getTitle()
                'subtitle' => $article->getContenu(), // ou getResume(), getDescription()...
            ];
        }

        // Renvoie un tableau JSON propre à ton application Flutter
        return $this->json($data);
    }
}
