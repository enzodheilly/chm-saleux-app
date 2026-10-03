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

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $email = null;

    /**
     * Adresse postale : donnée réellement sensible, isolée dans sa propre
     * table et chiffrée au repos (voir App\Entity\LicenceCoordonnees et
     * App\Doctrine\EncryptedStringType). Toujours manipulée via
     * getAdresse()/setAdresse() ci-dessous, qui délèguent ici de façon
     * transparente.
     */
    #[ORM\OneToOne(targetEntity: LicenceCoordonnees::class, mappedBy: 'licence', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private ?LicenceCoordonnees $coordonnees = null;

    #[ORM\ManyToOne(targetEntity: MembershipPlan::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?MembershipPlan $membershipPlan = null;

    #[ORM\Column(type: 'string', length: 64, unique: true, nullable: true)]
    private ?string $qrCodeToken = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $qrCodeUpdatedAt = null;

    #[ORM\Column(type: 'boolean')]
    private bool $activee = true;

    /**
     * Vrai pour les licences importées depuis l'historique papier/Excel du club
     * (saisons 2020-2026, avant la mise en place du formulaire en ligne). Ces
     * licences n'ont jamais eu de QR code d'accès réel et ne doivent pas compter
     * comme des licences "actives" du nouveau système en ligne.
     */
    #[ORM\Column(type: 'boolean')]
    private bool $historique = false;

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

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->coordonnees?->getAdresse();
    }

    public function setAdresse(?string $adresse): self
    {
        $this->coordonnees()->setAdresse($adresse);
        return $this;
    }

    /**
     * Crée l'entité "coordonnées sensibles" à la demande, plutôt que de
     * l'exiger dans le constructeur (une licence sans adresse renseignée,
     * cas courant, n'a pas besoin de ligne dans licence_coordonnees).
     */
    private function coordonnees(): LicenceCoordonnees
    {
        if ($this->coordonnees === null) {
            $this->coordonnees = new LicenceCoordonnees();
            $this->coordonnees->setLicence($this);
        }

        return $this->coordonnees;
    }

    public function getCoordonnees(): ?LicenceCoordonnees
    {
        return $this->coordonnees;
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

    public function isActivee(): bool { return $this->activee; }
    public function setActivee(bool $activee): self { $this->activee = $activee; return $this; }

    public function isHistorique(): bool { return $this->historique; }
    public function setHistorique(bool $historique): self { $this->historique = $historique; return $this; }

    public function getSaisonLabel(): string
    {
        if (!$this->expiryDate) {
            return '—';
        }
        $annee = (int) $this->expiryDate->format('Y');
        return ($annee - 1) . '/' . $annee;
    }

    public function getCheckIns(): Collection
    {
        return $this->checkIns;
    }
}
