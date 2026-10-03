<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Si l'utilisateur est déjà connecté, on le dégage vers l'accueil
        if ($this->getUser()) {
            return $this->redirectToRoute('accueil');
        }

        // Récupérer l'erreur de connexion s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();
        // Dernier nom d'utilisateur saisi
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/deconnexion', name: 'app_deconnexion')]
    public function logout(): void
    {
        throw new \LogicException('Ce point de déconnexion est intercepté par le firewall.');
    }

    #[Route('/authentification', name: 'app_auth_choice')]
    public function authChoice(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('accueil');
        }

        return $this->render('security/auth_choice.html.twig');
    }
}
