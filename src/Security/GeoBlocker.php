<?php

namespace App\Security;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class GeoBlocker
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) return;

        $request = $event->getRequest();
        $ip = $request->getClientIp();
        $route = $request->attributes->get('_route');

        // 1. ✅ EXCEPTION : Localhost
        if ($ip === '127.0.0.1' || $ip === '::1') return;

        // 2. ✅ EXCEPTION : Tes emails (Seulement si on n'est pas en plein login/2FA)
        // Cela évite l'erreur "User is not in a two-factor authentication process"
        if (!in_array($route, ['app_login', '2fa_login', '2fa_login_check'])) {
            try {
                $user = $this->security->getUser();
                if ($user && in_array($user->getUserIdentifier(), [
                    'enzodheilly134@gmail.com',
                    'enzo.dheilly78@gmail.com'
                ])) {
                    return;
                }
            } catch (\Exception $e) {
                // Si la 2FA bloque toujours l'accès à l'user, on continue simplement
            }
        }

        // 3. 🌍 VERIFICATION GEOGRAPHIQUE
        try {
            // On laisse toujours l'accès libre aux routes de connexion 
            // pour permettre aux admins de se connecter depuis l'étranger
            if (in_array($route, ['app_login', '2fa_login', '2fa_login_check'])) {
                return;
            }

            $context = stream_context_create(['http' => ['timeout' => 2]]);
            $response = @file_get_contents("http://ip-api.com/json/{$ip}?fields=countryCode", false, $context);
            $data = json_decode($response, true);

            if ($data && isset($data['countryCode']) && $data['countryCode'] !== 'FR') {
                throw new AccessDeniedHttpException("Accès réservé à la France.");
            }
        } catch (\Exception $e) {
            return; // En cas d'erreur API, on laisse passer pour éviter de bloquer tout le monde
        }
    }
}
