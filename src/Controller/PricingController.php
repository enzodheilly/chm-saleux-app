<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PricingController extends AbstractController
{
    #[Route('/tarifs', name: 'app_pricing')]
    public function index(): Response
    {
        // Exemple : on pourrait récupérer les prix depuis une Base de Données ici
        $plans = [
            ['name' => 'Découverte', 'price' => 0],
            ['name' => 'Pro', 'price' => 29],
            ['name' => 'Entreprise', 'price' => 99],
        ];

        return $this->render('pricing/index.html.twig', [
            'controller_name' => 'PricingController',
            'plans' => $plans,
        ]);
    }
}
