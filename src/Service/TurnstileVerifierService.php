<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TurnstileVerifierService
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $secretKey
    ) {}

    public function verify(?string $token, ?string $ip = null): bool
    {
        if (!$token) {
            return false;
        }

        try {
            $response = $this->httpClient->request('POST', 'https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'body' => [
                    'secret' => $this->secretKey,
                    'response' => $token,
                    'remoteip' => $ip,
                ],
                'timeout' => 5,
            ]);

            $data = $response->toArray(false);

            return !empty($data['success']);
        } catch (\Throwable) {
            // fail closed (sécurité)
            return false;
        }
    }
}
