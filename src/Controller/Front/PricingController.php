<?php

namespace App\Controller\Front;

use App\Repository\ForfaitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PricingController extends AbstractController
{
    #[Route('/tarifs', name: 'app_pricing')]
    public function index(ForfaitRepository $forfaitRepository): Response
    {
        // On récupère TOUS les forfaits, triés par prix
        $plans = $forfaitRepository->findBy([], ['prix' => 'ASC']);

        return $this->render('pricing/index.html.twig', [
            'plans' => $plans,
        ]);
    }
}
