<?php

namespace App\Security;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeoBlocker implements EventSubscriberInterface
{
    public function __construct(
        private readonly Security $security,
        private readonly HttpClientInterface $httpClient,
        private readonly CacheInterface $cache,
        private readonly string $allowedCountry = 'FR',
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
        $route = (string) $request->attributes->get('_route', '');

        // ✅ Appliquer seulement aux routes sensibles
        if (!str_starts_with($request->getPathInfo(), '/admin')) {
            return;
        }

        $ip = (string) ($request->getClientIp() ?? '');
        if ($ip === '' || $ip === '127.0.0.1' || $ip === '::1') {
            return;
        }

        // ✅ Optionnel : si déjà connecté admin -> laisse passer
        $user = $this->security->getUser();
        if ($user && in_array('ROLE_ADMIN', method_exists($user, 'getRoles') ? $user->getRoles() : [], true)) {
            return;
        }

        $country = $this->getCountryCodeCached($ip);

        // ✅ Si on n'a pas pu déterminer le pays -> fail-open (ne bloque pas)
        if ($country === null) {
            return;
        }

        if ($country !== $this->allowedCountry) {
            throw new AccessDeniedHttpException('Accès restreint.');
        }
    }

    private function getCountryCodeCached(string $ip): ?string
    {
        return $this->cache->get('geoip_' . md5($ip), function (ItemInterface $item) use ($ip) {
            $item->expiresAfter(86400); // 24h

            try {
                // ✅ Provider HTTPS (exemple). Choisis un provider fiable.
                $response = $this->httpClient->request('GET', 'https://ipapi.co/' . urlencode($ip) . '/country/', [
                    'timeout' => 1.5,
                    'headers' => ['Accept' => 'text/plain'],
                ]);

                if (200 !== $response->getStatusCode()) {
                    return null;
                }

                $country = trim($response->getContent(false));
                return $country !== '' ? $country : null;
            } catch (\Throwable) {
                return null;
            }
        });
    }
}
