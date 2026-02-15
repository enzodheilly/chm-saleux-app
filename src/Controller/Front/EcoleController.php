<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EcoleController extends AbstractController
{
    #[Route('/ecole', name: 'ecole')]
    public function index(): Response
    {
        return $this->render('ecole/index.html.twig');
    }
}
