<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;

class MaintenanceBypassController extends AbstractController
{
    public function __construct(
        private readonly string $maintenanceBypassToken,
    ) {}

    #[Route('/team-access/{token}', name: 'maintenance_bypass', methods: ['GET'])]
    public function bypass(string $token): RedirectResponse
    {
        // Token incorrect → 404 discret
        if (!hash_equals($this->maintenanceBypassToken, $token)) {
            throw $this->createNotFoundException();
        }

        // Valeur du cookie : HMAC signé côté serveur, pas le token en clair
        $cookieValue = hash_hmac('sha256', 'chm-bypass', $this->maintenanceBypassToken);

        $cookie = Cookie::create('chm_maintenance_bypass')
            ->withValue($cookieValue)
            ->withExpires(new \DateTimeImmutable('+30 days'))
            ->withPath('/')
            ->withHttpOnly(true)
            ->withSecure(true)
            ->withSameSite(Cookie::SAMESITE_LAX);

        $response = $this->redirect('/');
        $response->headers->setCookie($cookie);

        return $response;
    }
}
