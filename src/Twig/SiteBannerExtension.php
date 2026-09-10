<?php

namespace App\Twig;

use App\Entity\SiteBanner;
use App\Repository\SiteBannerRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SiteBannerExtension extends AbstractExtension
{
    private bool $loaded = false;
    private ?SiteBanner $cache = null;

    public function __construct(
        private readonly SiteBannerRepository $bannerRepository
    ) {}

    public function getFunctions(): array
    {
        return [
            new TwigFunction('site_banner', [$this, 'getActiveBanner']),
        ];
    }

    public function getActiveBanner(): ?SiteBanner
    {
        if (!$this->loaded) {
            $this->cache  = $this->bannerRepository->findActive();
            $this->loaded = true;
        }

        return $this->cache;
    }
}
