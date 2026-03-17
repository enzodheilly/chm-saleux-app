<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class SessionExpiredListener
{
    private RouterInterface $router;
    private RequestStack $requestStack;

    public function __construct(RouterInterface $router, RequestStack $requestStack)
    {
        $this->router = $router;
        $this->requestStack = $requestStack;
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof AuthenticationException) {

            $request = $this->requestStack->getCurrentRequest();

            if ($request) {
                $request->getSession()?->getFlashBag()->add(
                    'warning',
                    'Votre session a expiré. Veuillez vous reconnecter.'
                );
            }

            $response = new RedirectResponse(
                $this->router->generate('app_login')
            );

            $event->setResponse($response);
        }
    }
}
