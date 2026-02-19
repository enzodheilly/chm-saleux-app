<?php
// src/Controller/Front/LegalPageController.php

namespace App\Controller\Front;

use App\Repository\LegalPageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalPageController extends AbstractController
{
    #[Route('/legal/{slug}', name: 'legal_page_show')]
    public function show(LegalPageRepository $legalPageRepository, string $slug): Response
    {
        $page = $legalPageRepository->findOneBySlug($slug);

        if (!$page) {
            throw $this->createNotFoundException('Page non trouvée');
        }

        return $this->render('footer/legal_page/show.html.twig', [
            'page' => $page,
        ]);
    }
}
