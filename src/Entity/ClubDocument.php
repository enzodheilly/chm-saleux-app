<?php

namespace App\Entity;

use App\Repository\ClubDocumentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubDocumentRepository::class)]
#[ORM\Table(name: 'club_document')]
class ClubDocument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, unique: true)]
    private string $slug;

    #[ORM\Column(length: 255)]
    private string $originalFilename;

    #[ORM\Column]
    private int $fileSize;

    #[ORM\Column]
    private \DateTimeImmutable $uploadedAt;

    public function __construct(string $slug)
    {
        $this->slug = $slug;
        $this->uploadedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int { return $this->id; }

    public function getSlug(): string { return $this->slug; }

    public function getOriginalFilename(): string { return $this->originalFilename; }
    public function setOriginalFilename(string $v): static { $this->originalFilename = $v; return $this; }

    public function getFileSize(): int { return $this->fileSize; }
    public function setFileSize(int $v): static { $this->fileSize = $v; return $this; }

    public function getUploadedAt(): \DateTimeImmutable { return $this->uploadedAt; }
    public function setUploadedAt(\DateTimeImmutable $v): static { $this->uploadedAt = $v; return $this; }
}
