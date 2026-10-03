<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class LegacyRedirectController extends AbstractController
{
    #[Route('/login', name: 'legacy_redirect_login', methods: ['GET', 'POST'])]
    public function login(): RedirectResponse
    {
        return $this->redirectToRoute('app_connexion', [], 301);
    }

    #[Route('/logout', name: 'legacy_redirect_logout')]
    public function logout(): RedirectResponse
    {
        return $this->redirectToRoute('app_deconnexion', [], 301);
    }

    #[Route('/dashboard', name: 'legacy_redirect_dashboard', methods: ['GET'])]
    public function dashboard(): RedirectResponse
    {
        return $this->redirectToRoute('espace_adherent', [], 301);
    }
}
