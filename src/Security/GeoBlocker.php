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
        private readonly bool $blockVpn = true,
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

        if (!str_starts_with($request->getPathInfo(), '/gestion-chm-secrete-92x')) {
            return;
        }

        $ip = (string) ($request->getClientIp() ?? '');
        if ($ip === '' || $ip === '127.0.0.1' || $ip === '::1') {
            return;
        }

        $user = $this->security->getUser();
        if ($user && in_array('ROLE_ADMIN', method_exists($user, 'getRoles') ? $user->getRoles() : [], true)) {
            return;
        }

        $ipData = $this->getIpDataCached($ip);

        // Fail-open : si l'API ne répond pas, on laisse passer
        if ($ipData === null) {
            return;
        }

        // Blocage par pays
        if (($ipData['country'] ?? null) !== $this->allowedCountry) {
            throw new AccessDeniedHttpException('Accès restreint à la France.');
        }

        // Blocage VPN / Proxy / Tor / Datacenter
        if ($this->blockVpn && $this->isVpnOrProxy($ipData)) {
            throw new AccessDeniedHttpException('Accès via VPN ou proxy non autorisé.');
        }
    }

    private function isVpnOrProxy(array $ipData): bool
    {
        // ipapi.co retourne ces champs dans le plan payant
        // vpn, proxy, tor, relay sont des booléens
        // "hosting" indique un datacenter/cloud (ex: AWS, OVH, Hetzner...)
        return ($ipData['vpn'] ?? false)
            || ($ipData['proxy'] ?? false)
            || ($ipData['tor'] ?? false)
            || ($ipData['relay'] ?? false)   // iCloud Private Relay, etc.
            || ($ipData['hosting'] ?? false); // retirer si trop agressif (bloque les serveurs legit)
    }

    /**
     * @return array<string, mixed>|null
     */
    private function getIpDataCached(string $ip): ?array
    {
        return $this->cache->get('geoip_v2_' . md5($ip), function (ItemInterface $item) use ($ip): ?array {
            $item->expiresAfter(86400);

            try {
                // Endpoint JSON complet (vs /country/ qui ne retourne que le pays)
                $response = $this->httpClient->request('GET', 'https://ipapi.co/' . urlencode($ip) . '/json/', [
                    'timeout' => 2.0,
                    'headers' => ['Accept' => 'application/json'],
                ]);

                if (200 !== $response->getStatusCode()) {
                    return null;
                }

                $data = $response->toArray(false);

                // Erreur applicative retournée par ipapi.co (ex: reserved IP, invalid)
                if (isset($data['error']) && $data['error'] === true) {
                    return null;
                }

                return $data;
            } catch (\Throwable) {
                return null;
            }
        });
    }
}
