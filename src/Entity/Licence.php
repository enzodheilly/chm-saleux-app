<?php

namespace App\Entity;

use App\Repository\LicenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicenceRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Licence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(length: 20, unique: true)]
    private ?string $number = null;

    #[ORM\Column(type: 'json')]
    private array $benefits = [];

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $expiryDate = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'licences')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?User $user = null;

    #[ORM\Column(length: 100)]
    private ?string $firstName = null;

    #[ORM\Column(length: 100)]
    private ?string $lastName = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\ManyToOne(targetEntity: MembershipPlan::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?MembershipPlan $membershipPlan = null;

    #[ORM\Column(type: 'string', length: 64, unique: true, nullable: true)]
    private ?string $qrCodeToken = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $qrCodeUpdatedAt = null;

    #[ORM\OneToMany(mappedBy: 'licence', targetEntity: CheckIn::class, cascade: ['remove'], orphanRemoval: true)]
    private Collection $checkIns;

    public function __construct()
    {
        $this->checkIns = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function initializeQrCodeToken(): void
    {
        if ($this->qrCodeToken === null) {
            $this->qrCodeToken = bin2hex(random_bytes(32));
            $this->qrCodeUpdatedAt = new \DateTimeImmutable();
        }
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function getBenefits(): array
    {
        return $this->benefits;
    }

    public function setBenefits(array $benefits): self
    {
        $this->benefits = $benefits;
        return $this;
    }

    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(\DateTimeInterface $expiryDate): self
    {
        $this->expiryDate = $expiryDate;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getMembershipPlan(): ?MembershipPlan
    {
        return $this->membershipPlan;
    }

    public function setMembershipPlan(?MembershipPlan $membershipPlan): self
    {
        $this->membershipPlan = $membershipPlan;
        return $this;
    }

    public function isAlreadyAssociated(): bool
    {
        return $this->user !== null;
    }

    public function getQrCodeToken(): ?string
    {
        return $this->qrCodeToken;
    }

    public function setQrCodeToken(?string $qrCodeToken): self
    {
        $this->qrCodeToken = $qrCodeToken;
        return $this;
    }

    public function getQrCodeUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->qrCodeUpdatedAt;
    }

    public function setQrCodeUpdatedAt(?\DateTimeImmutable $qrCodeUpdatedAt): self
    {
        $this->qrCodeUpdatedAt = $qrCodeUpdatedAt;
        return $this;
    }

    public function getCheckIns(): Collection
    {
        return $this->checkIns;
    }
}
