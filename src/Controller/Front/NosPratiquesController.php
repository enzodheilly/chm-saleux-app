<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NosPratiquesController extends AbstractController
{
    #[Route('/nos-pratiques/halterophilie', name: 'pratique_haltérophilie')]
    public function halterophilie(): Response
    {
        return $this->render('nos_pratiques/halterophilie.html.twig');
    }

    #[Route('/nos-pratiques/musculation', name: 'pratique_musculation')]
    public function musculation(): Response
    {
        return $this->render('nos_pratiques/musculation.html.twig');
    }
}
