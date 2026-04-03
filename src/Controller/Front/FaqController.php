<?php

namespace App\Controller\Front;

use App\Service\FaqService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaqController extends AbstractController
{
    #[Route('/faq', name: 'faq')]
    public function index(FaqService $faqService): Response
    {
        return $this->render('1_accueil/section4/faq/faq.html.twig', [
            'faqs' => $faqService->getAll(),
        ]);
    }
}
