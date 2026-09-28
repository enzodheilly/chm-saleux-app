<?php

// src/Controller/GoogleController.php
namespace App\Controller\Security;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GoogleController extends AbstractController
{
    #[Route('/connexion/google', name: 'oauth_google_start')]
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

    #[Route('/connexion/google/callback', name: 'oauth_google_check')]
    public function connectCheck(): Response
    {
        // Cette action n'est en réalité jamais exécutée : GoogleAuthenticator::supports()
        // intercepte cette route et gère toute la logique d'authentification + la
        // redirection finale dans onAuthenticationSuccess(). Ce contrôleur ne sert qu'à
        // déclarer la route pour le bundle OAuth2 (redirect_route dans
        // knpu_oauth2_client.yaml) et satisfaire le routing Symfony.
        return $this->redirectToRoute('app_login');
    }
}
