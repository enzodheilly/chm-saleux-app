<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class EliosAiService
{
    private HttpClientInterface $client;
    private string $apiKey;

    public function __construct(HttpClientInterface $client, string $geminiApiKey)
    {
        $this->client = $client;
        $this->apiKey = $geminiApiKey;
    }

    public function getReply(string $userMessage, array $history = []): string
    {
        // Utilisation de v1beta pour une meilleure compatibilité des modèles flash
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $this->apiKey;

        try {
            $response = $this->client->request('POST', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => "Tu es Elios. Réponds de façon concise (3-4 phrases maximum). 
                                       IMPORTANT : Finis toujours ta dernière phrase par un point. 
                                       Va droit au but. Question : " . $userMessage]
                            ]
                        ]
                    ],
                    'generationConfig' => [
                        'temperature' => 0.7,
                        'maxOutputTokens' => 800
                    ]
                ]
            ]);

            // 1. Vérification spécifique du quota (Too Many Requests)
            if ($response->getStatusCode() === 429) {
                return "Désolé, j'ai reçu trop de messages. Mon quota est temporairement épuisé, réessaie dans quelques minutes !";
            }

            $data = $response->toArray(false);

            // 2. Si Google bloque pour une autre raison (sécurité, etc.)
            if (isset($data['error'])) {
                if (($data['error']['code'] ?? 0) === 429) {
                    return "Quota atteint : Je dois me reposer quelques instants avant de pouvoir te répondre à nouveau.";
                }
                return "Je rencontre une petite difficulté avec mon moteur de réponse. Réessaie ?";
            }

            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                $reply = $data['candidates'][0]['content']['parts'][0]['text'];
                $reply = trim(str_replace(['**', '__'], ['<b>', '</b>'], $reply));
                return $reply;
            }

            return "Je sèche... réessaie ?";
        } catch (\Exception $e) {
            // 3. Capture de l'erreur dans l'exception (si le client HTTP lance une erreur 429)
            if (str_contains($e->getMessage(), '429')) {
                return "Limite de messages atteinte. Je serai de nouveau disponible d'ici quelques minutes !";
            }

            return "Erreur technique : " . $e->getMessage();
        }
    }
}
