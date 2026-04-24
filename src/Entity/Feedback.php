<?php

namespace App\Entity;

use App\Repository\FeedbackRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FeedbackRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Feedback
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(type: 'text')]
    private ?string $message = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $page = null;

    #[ORM\Column(length: 50)]
    private string $status = 'new';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userEmail = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getType(): ?string
    {
        return $this->type;
    }
    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }
    public function getMessage(): ?string
    {
        return $this->message;
    }
    public function setMessage(string $message): static
    {
        $this->message = $message;
        return $this;
    }
    public function getPage(): ?string
    {
        return $this->page;
    }
    public function setPage(?string $page): static
    {
        $this->page = $page;
        return $this;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function setStatus(string $status): static
    {
        $this->status = $status;
        return $this;
    }
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }
    public function setUserEmail(?string $email): static
    {
        $this->userEmail = $email;
        return $this;
    }
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }
}
