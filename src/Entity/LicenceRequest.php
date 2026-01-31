<?php

namespace App\Entity;

use App\Repository\LicenceRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicenceRequestRepository::class)]
#[ORM\Table(name: 'licence_request')]
class LicenceRequest
{
    public const STATUS_PENDING   = 'PENDING';
    public const STATUS_CONFIRMED = 'CONFIRMED';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $userEmail = null;

    #[ORM\Column(length: 128, unique: true)]
    private string $token;

    #[ORM\Column(type: 'integer')]
    private int $failedAttempts = 0;

    #[ORM\Column(length: 20)]
    private string $status = self::STATUS_PENDING;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $confirmedAt = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $expiresAt;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $verificationCode = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $requesterIp = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->failedAttempts = 0;
        $this->status = self::STATUS_PENDING;
        // Expiration par défaut à 15 minutes
        $this->expiresAt = $this->createdAt->modify('+15 minutes');
        // Génération d'un token sécurisé pour le suivi de la session
        $this->token = bin2hex(random_bytes(32));
    }

    // =====================
    //    LOGIQUE MÉTIER
    // =====================

    /**
     * Vérifie si la demande est expirée
     */
    public function isExpired(): bool
    {
        return new \DateTimeImmutable() > $this->expiresAt;
    }

    /**
     * Incrémente le compteur d'échecs
     */
    public function incrementFailedAttempts(): self
    {
        $this->failedAttempts++;
        return $this;
    }

    // =====================
    //   GETTERS / SETTERS
    // =====================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $email): self
    {
        $this->userEmail = $email;
        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getConfirmedAt(): ?\DateTimeImmutable
    {
        return $this->confirmedAt;
    }

    public function setConfirmedAt(?\DateTimeImmutable $confirmedAt): self
    {
        $this->confirmedAt = $confirmedAt;
        return $this;
    }

    public function getExpiresAt(): \DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(\DateTimeImmutable $expiresAt): self
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    public function getVerificationCode(): ?string
    {
        return $this->verificationCode;
    }

    public function setVerificationCode(?string $verificationCode): self
    {
        $this->verificationCode = $verificationCode;
        return $this;
    }

    public function getRequesterIp(): ?string
    {
        return $this->requesterIp;
    }

    public function setRequesterIp(?string $requesterIp): self
    {
        $this->requesterIp = $requesterIp;
        return $this;
    }

    public function getFailedAttempts(): int
    {
        return $this->failedAttempts;
    }

    public function setFailedAttempts(int $failedAttempts): self
    {
        $this->failedAttempts = $failedAttempts;
        return $this;
    }
}
