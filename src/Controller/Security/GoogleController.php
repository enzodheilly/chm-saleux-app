<?php

// src/Controller/GoogleController.php
namespace App\Controller\Security;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GoogleController extends AbstractController
{
    #[Route('/connect/google', name: 'oauth_google_start')]
    public function connect(ClientRegistry $clientRegistry)
    {
        // On ajoute le deuxième argument au redirect() pour les options
        return $clientRegistry
            ->getClient('google')
            ->redirect(
                ['email', 'profile'], // Scopes demandés
                ['prompt' => 'select_account'] // OPTIONS : Force la sélection de compte
            );
    }

    #[Route('/connect/google/check', name: 'oauth_google_check')]
    public function connectCheck(): Response
    {
        // gestion du retour Google
        return $this->redirectToRoute('dashboard');
    }
}
