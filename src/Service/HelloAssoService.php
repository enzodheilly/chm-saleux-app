<?php

namespace App\Service;

use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpExceptionInterface;

/**
 * Client minimal pour l'API HelloAsso (v5) : authentification OAuth2
 * (client_credentials) + Checkout Intents pour le paiement en ligne des
 * licences.
 *
 * Doc : https://dev.helloasso.com/
 */
class HelloAssoService
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly CacheInterface $cache,
        private readonly SystemLoggerService $logger,
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $organizationSlug,
        private readonly string $apiBaseUrl = 'https://api.helloasso.com',
    ) {}

    public function isConfigured(): bool
    {
        return $this->clientId !== '' && $this->clientSecret !== '' && $this->organizationSlug !== '';
    }

    /**
     * Récupère (et met en cache) un access token OAuth2 valide.
     */
    private function getAccessToken(): string
    {
        return $this->cache->get('helloasso_access_token', function (ItemInterface $item) {
            $response = $this->httpClient->request('POST', $this->apiBaseUrl . '/oauth2/token', [
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
                'body' => [
                    'grant_type'    => 'client_credentials',
                    'client_id'     => $this->clientId,
                    'client_secret' => $this->clientSecret,
                ],
                'timeout' => 10,
            ]);

            $data = $response->toArray();

            // Le token est valide ~30 min (1799s) ; on garde une marge de sécurité.
            $expiresIn = (int) ($data['expires_in'] ?? 1700);
            $item->expiresAfter(max(60, $expiresIn - 90));

            return (string) $data['access_token'];
        });
    }

    /**
     * Crée une Checkout Intent HelloAsso pour un paiement en ligne.
     *
     * @param array{firstName:string,lastName:string,email:string} $payer
     * @param array<string,string> $metadata
     * @return array{id:int|string,redirectUrl:string}
     * @throws \RuntimeException
     */
    public function createCheckoutIntent(
        int $totalAmountCents,
        string $itemName,
        array $payer,
        string $backUrl,
        string $errorUrl,
        string $returnUrl,
        array $metadata = [],
    ): array {
        try {
            $token = $this->getAccessToken();

            $response = $this->httpClient->request(
                'POST',
                sprintf('%s/v5/organizations/%s/checkout-intents', $this->apiBaseUrl, $this->organizationSlug),
                [
                    'auth_bearer' => $token,
                    'json' => [
                        'totalAmount' => $totalAmountCents,
                        'initialAmount' => $totalAmountCents,
                        'itemName' => mb_substr($itemName, 0, 250),
                        'backUrl' => $backUrl,
                        'errorUrl' => $errorUrl,
                        'returnUrl' => $returnUrl,
                        'containsDonation' => false,
                        'payer' => $payer,
                        'metadata' => $metadata,
                    ],
                    'timeout' => 15,
                ]
            );

            $data = $response->toArray();

            if (empty($data['id']) || empty($data['redirectUrl'])) {
                throw new \RuntimeException('Réponse HelloAsso inattendue (id/redirectUrl manquant).');
            }

            return $data;
        } catch (HttpExceptionInterface|\Throwable $e) {
            $this->logger->add('HelloAsso', 'Erreur création Checkout Intent : ' . $e->getMessage());
            throw new \RuntimeException('Impossible de contacter HelloAsso pour initialiser le paiement.', 0, $e);
        }
    }

    /**
     * Relit l'état d'une Checkout Intent (source de vérité pour valider un paiement).
     *
     * @return array<string,mixed>
     * @throws \RuntimeException
     */
    public function getCheckoutIntent(string $checkoutIntentId): array
    {
        try {
            $token = $this->getAccessToken();

            $response = $this->httpClient->request(
                'GET',
                sprintf('%s/v5/organizations/%s/checkout-intents/%s', $this->apiBaseUrl, $this->organizationSlug, $checkoutIntentId),
                [
                    'auth_bearer' => $token,
                    'timeout' => 15,
                ]
            );

            return $response->toArray();
        } catch (HttpExceptionInterface|\Throwable $e) {
            $this->logger->add('HelloAsso', 'Erreur lecture Checkout Intent ' . $checkoutIntentId . ' : ' . $e->getMessage());
            throw new \RuntimeException('Impossible de vérifier le statut du paiement HelloAsso.', 0, $e);
        }
    }

    /**
     * Détermine si une Checkout Intent contient au moins un paiement autorisé.
     */
    public function isCheckoutIntentPaid(array $checkoutIntent): bool
    {
        $payments = $checkoutIntent['order']['payments'] ?? [];
        foreach ($payments as $payment) {
            if (($payment['state'] ?? null) === 'Authorized') {
                return true;
            }
        }

        return false;
    }

    /**
     * Détermine si le paiement a été explicitement refusé (permet d'afficher
     * un message adapté plutôt qu'un simple "en attente").
     */
    public function isCheckoutIntentRefused(array $checkoutIntent): bool
    {
        $payments = $checkoutIntent['order']['payments'] ?? [];
        if (empty($payments)) {
            return false;
        }
        foreach ($payments as $payment) {
            $state = $payment['state'] ?? null;
            if (!in_array($state, ['Refused', 'Refunded', 'Contested'], true)) {
                return false;
            }
        }

        return true;
    }
}
