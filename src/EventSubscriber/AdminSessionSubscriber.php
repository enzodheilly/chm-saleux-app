<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AdminSessionSubscriber implements EventSubscriberInterface
{
    private const ADMIN_SESSION_LIFETIME = 7200; // 2 heures en secondes

    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly RouterInterface $router
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 10],
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $session = $request->getSession();

        // Vérifier si c'est une route admin
        $path = $request->getPathInfo();
        if (!str_starts_with($path, '/gestion-chm-secrete-92x')) {
            return;
        }

        // Vérifier si l'utilisateur est admin
        $token = $this->tokenStorage->getToken();
        if (!$token) {
            return;
        }

        $user = $token->getUser();
        if (!$user || !in_array('ROLE_ADMIN', $user->getRoles(), true)) {
            return;
        }

        // Vérifier la dernière activité
        $lastActivity = $session->get('admin_last_activity');
        $now = time();

        if ($lastActivity && ($now - $lastActivity) > self::ADMIN_SESSION_LIFETIME) {
            // Session expirée — déconnexion forcée
            $this->tokenStorage->setToken(null);
            $session->invalidate();
            $session->getFlashBag()->add('warning', 'Votre session admin a expiré après 2h d\'inactivité.');
            $event->setResponse(new RedirectResponse($this->router->generate('app_login')));
            return;
        }

        // Mettre à jour la dernière activité
        $session->set('admin_last_activity', $now);
    }
}
