<?php

namespace App\EventSubscriber;

use App\Repository\SecurityLogRepository;
use Presta\SitemapBundle\Event\SitemapPopulateEvent;
use Presta\SitemapBundle\Service\UrlContainerInterface;
use Presta\SitemapBundle\Sitemap\Url\UrlConcrete;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SitemapSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            SitemapPopulateEvent::class => 'onSitemapPopulate',
        ];
    }

    public function onSitemapPopulate(SitemapPopulateEvent $event): void
    {
        $urls = $event->getUrlContainer();

        // Pages principales
        $this->addUrl($urls, 'home', [], 1.0, 'daily');
        $this->addUrl($urls, 'contact', [], 0.7, 'monthly');
        $this->addUrl($urls, 'ecole', [], 0.8, 'weekly');
        $this->addUrl($urls, 'faq', [], 0.7, 'weekly');
        $this->addUrl($urls, 'halterophilie', [], 0.8, 'weekly');
        $this->addUrl($urls, 'musculation', [], 0.8, 'weekly');
        $this->addUrl($urls, 'evenements', [], 0.7, 'weekly');
        $this->addUrl($urls, 'sauna', [], 0.6, 'monthly');
        $this->addUrl($urls, 'horaires', [], 0.8, 'weekly');

        // Membres du bureau
        $this->addUrl($urls, 'president', [], 0.6, 'monthly');
        $this->addUrl($urls, 'tresorier', [], 0.5, 'monthly');
        $this->addUrl($urls, 'secretaire', [], 0.5, 'monthly');
    }

    private function addUrl(
        UrlContainerInterface $urls,
        string $route,
        array $params,
        float $priority,
        string $changefreq
    ): void {
        $url = $this->urlGenerator->generate($route, $params, UrlGeneratorInterface::ABSOLUTE_URL);

        $urls->addUrl(
            new UrlConcrete($url, new \DateTimeImmutable(), $changefreq, $priority),
            'default'
        );
    }
}
