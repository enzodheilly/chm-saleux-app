<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AppSettingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppSettingRepository::class)]
#[ORM\Table(name: 'app_setting')]
class AppSetting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, unique: true)]
    private string $settingKey;

    #[ORM\Column(type: 'text')]
    private string $settingValue;

    public function getId(): ?int { return $this->id; }

    public function getSettingKey(): string { return $this->settingKey; }
    public function setSettingKey(string $key): static { $this->settingKey = $key; return $this; }

    public function getSettingValue(): string { return $this->settingValue; }
    public function setSettingValue(string $value): static { $this->settingValue = $value; return $this; }
}
