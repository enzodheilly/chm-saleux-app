<?php

namespace App\EventSubscriber;

use App\Service\SystemLoggerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class LoginSubscriber implements EventSubscriberInterface
{
    public function __construct(private SystemLoggerService $logger) {}

    public static function getSubscribedEvents(): array
    {
        return [
            LogoutEvent::class => 'onLogout',
        ];
    }

    public function onLogout(LogoutEvent $event): void
    {
        $user = $event->getToken()?->getUser();
        if ($user && method_exists($user, 'getUserIdentifier')) {
            $pseudo = $this->logger->pseudonymizeEmail($user->getUserIdentifier());
            $this->logger->add(
                SystemLoggerService::TYPE_SESSION,
                sprintf('Déconnexion : %s', $pseudo)
            );
        }
    }
}
