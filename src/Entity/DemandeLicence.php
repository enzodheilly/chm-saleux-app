<?php

namespace App\Entity;

use App\Repository\DemandeLicenceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeLicenceRepository::class)]
#[ORM\Table(name: 'demandes_licence')]
class DemandeLicence
{
    public const FORMULES = ['jeune', 'competition', 'loisir'];

    public const MODE_PAIEMENT_EN_LIGNE = 'en_ligne';
    public const MODE_PAIEMENT_AU_CLUB  = 'au_club';
    public const MODES_PAIEMENT = [self::MODE_PAIEMENT_EN_LIGNE, self::MODE_PAIEMENT_AU_CLUB];

    public const STATUT_PAIEMENT_EN_ATTENTE     = 'en_attente';
    public const STATUT_PAIEMENT_A_ENCAISSER    = 'a_encaisser_club';
    public const STATUT_PAIEMENT_PAYEE          = 'payee';

    public const STATUT_FFHM_A_TRANSFERER = 'a_transferer';
    public const STATUT_FFHM_TRANSFEREE   = 'transferee';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private string $formule = 'loisir';

    #[ORM\Column(type: 'boolean')]
    private bool $tarifReduit = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $justificatifReduitPath = null;

    #[ORM\Column(type: 'smallint')]
    private int $foyerRang = 1;

    #[ORM\Column(length: 100)]
    private string $nom = '';

    #[ORM\Column(length: 100)]
    private string $prenom = '';

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $sexe = null;

    #[ORM\Column(type: 'date_immutable', nullable: true)]
    private ?\DateTimeImmutable $dateNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 180)]
    private string $email = '';

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $responsableNom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $responsableLien = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $responsableTelephone = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $responsableEmail = null;

    #[ORM\Column(length: 255)]
    private string $certificatMedicalPath = '';

    #[ORM\Column(type: 'decimal', precision: 7, scale: 2)]
    private string $montantCalcule = '0.00';

    #[ORM\Column(length: 20)]
    private string $modePaiement = self::MODE_PAIEMENT_AU_CLUB;

    #[ORM\Column(length: 20)]
    private string $statutPaiement = self::STATUT_PAIEMENT_EN_ATTENTE;

    #[ORM\Column(length: 20)]
    private string $statutFfhm = self::STATUT_FFHM_A_TRANSFERER;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notesAdmin = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int { return $this->id; }

    public function getFormule(): string { return $this->formule; }
    public function setFormule(string $formule): self { $this->formule = $formule; return $this; }

    public function isTarifReduit(): bool { return $this->tarifReduit; }
    public function setTarifReduit(bool $tarifReduit): self { $this->tarifReduit = $tarifReduit; return $this; }

    public function getJustificatifReduitPath(): ?string { return $this->justificatifReduitPath; }
    public function setJustificatifReduitPath(?string $path): self { $this->justificatifReduitPath = $path; return $this; }

    public function getFoyerRang(): int { return $this->foyerRang; }
    public function setFoyerRang(int $foyerRang): self { $this->foyerRang = max(1, $foyerRang); return $this; }

    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }

    public function getPrenom(): string { return $this->prenom; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }

    public function getSexe(): ?string { return $this->sexe; }
    public function setSexe(?string $sexe): self { $this->sexe = $sexe; return $this; }

    public function getDateNaissance(): ?\DateTimeImmutable { return $this->dateNaissance; }
    public function setDateNaissance(?\DateTimeImmutable $dateNaissance): self { $this->dateNaissance = $dateNaissance; return $this; }

    public function getAdresse(): ?string { return $this->adresse; }
    public function setAdresse(?string $adresse): self { $this->adresse = $adresse; return $this; }

    public function getTelephone(): ?string { return $this->telephone; }
    public function setTelephone(?string $telephone): self { $this->telephone = $telephone; return $this; }

    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }

    public function getResponsableNom(): ?string { return $this->responsableNom; }
    public function setResponsableNom(?string $v): self { $this->responsableNom = $v; return $this; }

    public function getResponsableLien(): ?string { return $this->responsableLien; }
    public function setResponsableLien(?string $v): self { $this->responsableLien = $v; return $this; }

    public function getResponsableTelephone(): ?string { return $this->responsableTelephone; }
    public function setResponsableTelephone(?string $v): self { $this->responsableTelephone = $v; return $this; }

    public function getResponsableEmail(): ?string { return $this->responsableEmail; }
    public function setResponsableEmail(?string $v): self { $this->responsableEmail = $v; return $this; }

    public function getCertificatMedicalPath(): string { return $this->certificatMedicalPath; }
    public function setCertificatMedicalPath(string $path): self { $this->certificatMedicalPath = $path; return $this; }

    public function getMontantCalcule(): string { return $this->montantCalcule; }
    public function setMontantCalcule(string|float $montant): self { $this->montantCalcule = number_format((float) $montant, 2, '.', ''); return $this; }

    public function getModePaiement(): string { return $this->modePaiement; }
    public function setModePaiement(string $modePaiement): self { $this->modePaiement = $modePaiement; return $this; }

    public function getStatutPaiement(): string { return $this->statutPaiement; }
    public function setStatutPaiement(string $statutPaiement): self { $this->statutPaiement = $statutPaiement; return $this; }

    public function getStatutFfhm(): string { return $this->statutFfhm; }
    public function setStatutFfhm(string $statutFfhm): self { $this->statutFfhm = $statutFfhm; return $this; }

    public function getNotesAdmin(): ?string { return $this->notesAdmin; }
    public function setNotesAdmin(?string $notesAdmin): self { $this->notesAdmin = $notesAdmin; return $this; }

    public function getCreatedAt(): \DateTimeImmutable { return $this->createdAt; }

    public function isMineur(): bool
    {
        if (!$this->dateNaissance) {
            return false;
        }
        return $this->dateNaissance->diff(new \DateTimeImmutable())->y < 18;
    }
}
