<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Bundle\SecurityBundle\Security;

class ForceSetPasswordSubscriber implements EventSubscriberInterface
{
    // Routes autorisées sans avoir configuré son mot de passe
    private const ALLOWED_ROUTES = [
        'set_password',
        'app_logout',
        'legal_page_show',
    ];

    public function __construct(
        private Security $security,
        private RouterInterface $router
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 5],
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        /** @var User|null $user */
        $user = $this->security->getUser();

        if (!$user instanceof User) {
            return;
        }

        if (!$user->getNeedsPassword()) {
            return;
        }

        $request = $event->getRequest();

        // Les routes API reçoivent une 403 JSON, pas une redirection HTML
        if (str_starts_with($request->getPathInfo(), '/api/')) {
            return;
        }

        $currentRoute = $request->attributes->get('_route');

        if (in_array($currentRoute, self::ALLOWED_ROUTES, true)) {
            return;
        }

        $event->setResponse(
            new RedirectResponse($this->router->generate('set_password'))
        );
    }
}
