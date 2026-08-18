<?php

namespace App\Entity;

use App\Repository\CheckInRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CheckInRepository::class)]
#[ORM\Index(columns: ['licence_id', 'scanned_at'], name: 'idx_check_in_licence_scanned_at')]
class CheckIn
{
    public const TYPE_IN = 'IN';
    public const TYPE_OUT = 'OUT';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Licence::class, inversedBy: 'checkIns')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Licence $licence = null;

    #[ORM\Column(length: 3)]
    private ?string $type = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $scannedAt = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $source = null;

    public function __construct()
    {
        $this->scannedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicence(): ?Licence
    {
        return $this->licence;
    }

    public function setLicence(?Licence $licence): self
    {
        $this->licence = $licence;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getScannedAt(): ?\DateTimeImmutable
    {
        return $this->scannedAt;
    }

    public function setScannedAt(\DateTimeImmutable $scannedAt): self
    {
        $this->scannedAt = $scannedAt;
        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;
        return $this;
    }
}
