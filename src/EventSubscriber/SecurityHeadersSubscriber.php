<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class SecurityHeadersSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $response = $event->getResponse();

        // ✅ Empêche le navigateur de deviner le type MIME
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // ✅ Protection XSS basique (legacy browsers)
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // ✅ Empêche l'affichage dans une iframe (clickjacking)
        // Déjà géré par nelmio_security mais on le double ici
        $response->headers->set('X-Frame-Options', 'DENY');

        // ✅ Contrôle les infos envoyées dans le header Referer
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // ✅ Désactive les fonctionnalités du navigateur non utilisées
        $response->headers->set(
            'Permissions-Policy',
            'camera=(), microphone=(), geolocation=(), payment=(), usb=(), fullscreen=(self)'
        );

        // ✅ HSTS — uniquement en HTTPS
        if ($event->getRequest()->isSecure()) {
            $response->headers->set(
                'Strict-Transport-Security',
                'max-age=31536000; includeSubDomains; preload'
            );
        }

        // ✅ Masque la technologie utilisée
        $response->headers->remove('X-Powered-By');
        $response->headers->set('Server', '');
    }
}
