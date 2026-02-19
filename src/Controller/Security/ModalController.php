<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModalController extends AbstractController
{
    #[Route('/auth/modal/{view}', name: 'app_auth_modal')]
    public function modal(string $view): Response
    {
        $allowed = ['register', 'login', 'forgot', 'verify_code'];

        if (!in_array($view, $allowed, true)) {
            throw $this->createNotFoundException('Vue non autorisée');
        }

        // ✅ Turnstile: clé publique
        $turnstileSiteKey = $_ENV['TURNSTILE_SITE_KEY'] ?? '';

        return $this->render("modal/auth_{$view}.html.twig", [
            'turnstile_site_key' => $turnstileSiteKey,
        ]);
    }
}
