<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class MaintenanceModeSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly Environment $twig,
        private readonly string $maintenanceMode,
        private readonly string $maintenanceBypassToken,
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 200],
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        if ($this->maintenanceMode !== 'true') {
            return;
        }

        $path = $event->getRequest()->getPathInfo();

        // L'API mobile reste toujours accessible
        if (str_starts_with($path, '/api')) {
            return;
        }

        // La route de bypass laisse passer (le contrôleur pose le cookie)
        if (str_starts_with($path, '/team-access/')) {
            return;
        }

        // Les assets statiques doivent charger même sur la page de maintenance
        if (preg_match('#^/(css|js|images|fonts|bundles|favicon\.ico)#', $path)) {
            return;
        }

        // Cookie de bypass valide : le visiteur voit le site normalement
        if ($this->hasValidBypassCookie($event->getRequest())) {
            return;
        }

        $content = $this->twig->render('maintenance.html.twig');
        $event->setResponse(new Response($content, Response::HTTP_SERVICE_UNAVAILABLE, [
            'Retry-After' => '3600',
        ]));
    }

    private function hasValidBypassCookie(\Symfony\Component\HttpFoundation\Request $request): bool
    {
        $cookie = $request->cookies->get('chm_maintenance_bypass');
        if (!$cookie) {
            return false;
        }

        $expected = hash_hmac('sha256', 'chm-bypass', $this->maintenanceBypassToken);

        return hash_equals($expected, $cookie);
    }
}
