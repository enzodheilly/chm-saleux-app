<?php

namespace App\Entity;

use App\Repository\ContactMessageRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactMessageRepository::class)]
class ContactMessage
{
    public const SUBJECT_CHOICES = [
        'Renseignements généraux' => 'renseignement',
        'Séance d\'essai' => 'essai',
        'Tarifs & inscription' => 'tarifs',
        'Horaires du club' => 'horaires',
        'Coaching / accompagnement' => 'coaching',
        'Compétitions' => 'competitions',
        'Partenariat' => 'partenariat',
        'Problème technique' => 'technique',
        'Autre demande' => 'autre',
    ];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: "SET NULL")]
    private ?User $user = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "Le nom est obligatoire.")]
    #[Assert\Length(max: 100)]
    #[Assert\Regex(pattern: "/^[\p{L}\s\-']+$/u", message: "Le nom contient des caractères invalides.")]
    private ?string $lastName = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "Le prénom est obligatoire.")]
    #[Assert\Length(max: 100)]
    #[Assert\Regex(pattern: "/^[\p{L}\s\-']+$/u", message: "Le prénom contient des caractères invalides.")]
    private ?string $firstName = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank(message: "L'email est obligatoire.")]
    #[Assert\Email(message: "L'email '{{ value }}' n'est pas valide.")]
    #[Assert\Length(max: 150)]
    private ?string $email = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Assert\Regex(pattern: "/^[0-9\s\+\-\(\)]{7,20}$/", message: "Le numéro de téléphone n'est pas valide.")]
    private ?string $phone = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $subject = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Le message est obligatoire.")]
    #[Assert\Length(min: 10, max: 2000, minMessage: "Le message doit contenir au moins {{ limit }} caractères.", maxMessage: "Le message ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $content = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $response = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resolvedBy = null;

    #[ORM\Column(type: 'boolean')]
    private bool $isFromAdmin = false;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->isFromAdmin = false;
    }

    public static function getSubjectChoices(): array
    {
        return self::SUBJECT_CHOICES;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(?string $response): self
    {
        $this->response = $response;
        return $this;
    }

    public function getResolvedBy(): ?string
    {
        return $this->resolvedBy;
    }

    public function setResolvedBy(?string $resolvedBy): self
    {
        $this->resolvedBy = $resolvedBy;
        return $this;
    }

    public function isFromAdmin(): bool
    {
        return $this->isFromAdmin;
    }

    public function setIsFromAdmin(bool $isFromAdmin): self
    {
        $this->isFromAdmin = $isFromAdmin;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
