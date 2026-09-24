<?php

namespace App\Twig;

use App\Repository\SiteBannerMessageRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SiteBannerExtension extends AbstractExtension
{
    private bool $loaded = false;
    private ?array $cache = null;

    public function __construct(
        private readonly SiteBannerMessageRepository $messageRepository
    ) {}

    public function getFunctions(): array
    {
        return [
            new TwigFunction('site_banner', [$this, 'getActiveBannerMessages']),
        ];
    }

    /**
     * Retourne les textes des messages actifs (tableau de strings).
     * Retourne null si aucun message actif → bannière masquée.
     */
    public function getActiveBannerMessages(): ?array
    {
        if (!$this->loaded) {
            $messages = $this->messageRepository->findAllActive();
            $this->cache  = empty($messages)
                ? null
                : array_map(fn($m) => $m->getText(), $messages);
            $this->loaded = true;
        }

        return $this->cache;
    }
}
