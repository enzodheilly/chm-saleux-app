<?php

// src/Controller/MenuDropdownController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuDropdownController extends AbstractController
{
    // === Services du Club ===
    #[Route('/halterophilie', name: 'halterophilie')]
    public function halterophilie(): Response
    {
        return $this->render('menu_dropdown/services_du_club/halterophilie/index.html.twig', [
            'page_title' => 'Haltérophilie',
        ]);
    }

    #[Route('/musculation', name: 'musculation')]
    public function musculation(): Response
    {
        return $this->render('menu_dropdown/services_du_club/musculation/index.html.twig', [
            'page_title' => 'Musculation',
        ]);
    }

    #[Route('/cours-collectifs', name: 'cours_collectifs')]
    public function coursCollectifs(): Response
    {
        return $this->render('menu_dropdown/cours_collectifs.html.twig', [
            'page_title' => 'Cours collectifs',
        ]);
    }

    #[Route('/zones-entrainement', name: 'zones_entrainement')]
    public function zonesEntrainement(): Response
    {
        return $this->render('menu_dropdown/zones_entrainement.html.twig', [
            'page_title' => "Les zones d'entraînement",
        ]);
    }

    #[Route('/seance-essai', name: 'seance_essai')]
    public function seanceEssai(): Response
    {
        return $this->render('menu_dropdown/services_du_club/seance_essai/index.html.twig', [
            'page_title' => "Séance d'essai",
        ]);
    }

    #[Route('/evenements', name: 'evenements')]
    public function evenements(): Response
    {
        return $this->render('menu_dropdown/evenements.html.twig', [
            'page_title' => 'Événements organisés',
        ]);
    }

    // === Membres du bureau ===
    #[Route('/president', name: 'president')]
    public function president(): Response
    {
        return $this->render('menu_dropdown/president.html.twig', [
            'page_title' => 'Le Président',
        ]);
    }

    #[Route('/tresorier', name: 'tresorier')]
    public function tresorier(): Response
    {
        return $this->render('menu_dropdown/tresorier.html.twig', [
            'page_title' => 'Le Trésorier',
        ]);
    }

    #[Route('/secretaire', name: 'secretaire')]
    public function secretaire(): Response
    {
        return $this->render('menu_dropdown/secretaire.html.twig', [
            'page_title' => 'La Secrétaire',
        ]);
    }

    #[Route('/membres-bureau', name: 'membres_bureau')]
    public function membresBureau(): Response
    {
        return $this->render('menu_dropdown/membres_bureau.html.twig', [
            'page_title' => 'Les membres du bureau',
        ]);
    }

    // === À propos du club ===
    #[Route('/app-club', name: 'app_club')]
    public function appClub(): Response
    {
        return $this->render('menu_dropdown/a_propos_de_notre_club/presentation_club/index.html.twig', [
            'page_title' => 'Présentation du club',
        ]);
    }

    #[Route('/labels-club', name: 'labels_club')]
    public function labelsClub(): Response
    {
        return $this->render('menu_dropdown/a_propos_de_notre_club/labels/index.html.twig', [
            'page_title' => 'Les labels du club',
        ]);
    }

    #[Route('/horaires', name: 'horaires')]
    public function horaires(): Response
    {
        return $this->render('menu_dropdown/a_propos_de_notre_club/horaires/index.html.twig', [
            'page_title' => 'Les horaires',
        ]);
    }
}
