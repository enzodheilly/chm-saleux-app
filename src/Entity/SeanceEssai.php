<?php

namespace App\Entity;

use App\Repository\SeanceEssaiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeanceEssaiRepository::class)]
#[ORM\Table(name: 'seances_essai')]
class SeanceEssai
{
    public const SPORTS = ['Haltérophilie', 'Musculation'];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private string $nom = '';

    #[ORM\Column(length: 100)]
    private string $prenom = '';

    #[ORM\Column(length: 50)]
    private string $sport = 'Haltérophilie';

    #[ORM\Column(type: 'date_immutable')]
    private \DateTimeImmutable $dateSeance;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $sexe = null;

    #[ORM\Column(type: 'date_immutable', nullable: true)]
    private ?\DateTimeImmutable $dateNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $responsableNom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $responsableLien = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $responsableTelephone = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $responsableEmail = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $lieuSignature = 'Saleux';

    #[ORM\Column(type: 'date_immutable', nullable: true)]
    private ?\DateTimeImmutable $dateSignature = null;

    public function __construct()
    {
        $this->dateSeance = new \DateTimeImmutable();
        $this->createdAt  = new \DateTimeImmutable();
    }

    public function getId(): ?int { return $this->id; }

    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }

    public function getPrenom(): string { return $this->prenom; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }

    public function getSport(): string { return $this->sport; }
    public function setSport(string $sport): self { $this->sport = $sport; return $this; }

    public function getDateSeance(): \DateTimeImmutable { return $this->dateSeance; }
    public function setDateSeance(\DateTimeImmutable $dateSeance): self { $this->dateSeance = $dateSeance; return $this; }

    public function getCreatedAt(): \DateTimeImmutable { return $this->createdAt; }

    public function getSexe(): ?string { return $this->sexe; }
    public function setSexe(?string $sexe): self { $this->sexe = $sexe; return $this; }

    public function getDateNaissance(): ?\DateTimeImmutable { return $this->dateNaissance; }
    public function setDateNaissance(?\DateTimeImmutable $dateNaissance): self { $this->dateNaissance = $dateNaissance; return $this; }

    public function getAdresse(): ?string { return $this->adresse; }
    public function setAdresse(?string $adresse): self { $this->adresse = $adresse; return $this; }

    public function getTelephone(): ?string { return $this->telephone; }
    public function setTelephone(?string $telephone): self { $this->telephone = $telephone; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(?string $email): self { $this->email = $email; return $this; }

    public function getResponsableNom(): ?string { return $this->responsableNom; }
    public function setResponsableNom(?string $responsableNom): self { $this->responsableNom = $responsableNom; return $this; }

    public function getResponsableLien(): ?string { return $this->responsableLien; }
    public function setResponsableLien(?string $responsableLien): self { $this->responsableLien = $responsableLien; return $this; }

    public function getResponsableTelephone(): ?string { return $this->responsableTelephone; }
    public function setResponsableTelephone(?string $responsableTelephone): self { $this->responsableTelephone = $responsableTelephone; return $this; }

    public function getResponsableEmail(): ?string { return $this->responsableEmail; }
    public function setResponsableEmail(?string $responsableEmail): self { $this->responsableEmail = $responsableEmail; return $this; }

    public function getLieuSignature(): ?string { return $this->lieuSignature; }
    public function setLieuSignature(?string $lieuSignature): self { $this->lieuSignature = $lieuSignature; return $this; }

    public function getDateSignature(): ?\DateTimeImmutable { return $this->dateSignature; }
    public function setDateSignature(?\DateTimeImmutable $dateSignature): self { $this->dateSignature = $dateSignature; return $this; }
}
