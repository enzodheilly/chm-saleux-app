<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NosPratiquesController extends AbstractController
{
    #[Route('/zone-haltérophilie', name: 'pratique_haltérophilie')]
    public function halterophilie(): Response
    {
        return $this->render('nos_pratiques/halterophilie.html.twig');
    }

    #[Route('/zone-musculation', name: 'pratique_musculation')]
    public function musculation(): Response
    {
        return $this->render('nos_pratiques/musculation.html.twig');
    }
}
