<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\AppSetting;
use App\Repository\AppSettingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class MaintenanceSettingService
{
    private const CACHE_KEY = 'chm_maintenance_mode';
    private const SETTING_KEY = 'maintenance_mode';
    private const TTL = 5;

    public function __construct(
        private readonly AppSettingRepository $repo,
        private readonly EntityManagerInterface $em,
        private readonly CacheInterface $cache,
    ) {}

    public function isEnabled(): bool
    {
        return (bool) $this->cache->get(self::CACHE_KEY, function (ItemInterface $item): int {
            $item->expiresAfter(self::TTL);
            $setting = $this->repo->findOneBy(['settingKey' => self::SETTING_KEY]);

            return $setting ? (int) $setting->getSettingValue() : 0;
        });
    }

    public function set(bool $enabled): void
    {
        $setting = $this->repo->findOneBy(['settingKey' => self::SETTING_KEY]);

        if ($setting === null) {
            $setting = (new AppSetting())->setSettingKey(self::SETTING_KEY);
            $this->em->persist($setting);
        }

        $setting->setSettingValue($enabled ? '1' : '0');
        $this->em->flush();

        $this->cache->delete(self::CACHE_KEY);
    }
}
