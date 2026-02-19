<?php
// src/Controller/Front/MembershipPricingController.php

namespace App\Controller\Front;

use App\Repository\MembershipPlanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MembershipPricingController extends AbstractController
{
    #[Route('/tarifs', name: 'app_pricing')]
    public function index(MembershipPlanRepository $membershipPlanRepository): Response
    {
        $plans = $membershipPlanRepository->findBy([], ['price' => 'ASC']);

        return $this->render('pricing/index.html.twig', [
            'plans' => $plans,
        ]);
    }
}
