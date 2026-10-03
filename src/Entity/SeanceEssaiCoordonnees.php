<?php

namespace App\Entity;

use App\Repository\SeanceEssaiCoordonneesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Coordonnées personnelles sensibles d'une séance d'essai (adresse,
 * téléphones), isolées dans leur propre table et chiffrées au repos — même
 * logique que App\Entity\DemandeLicenceCoordonnees, voir son commentaire
 * pour le détail.
 *
 * Toujours manipulée via les accesseurs de SeanceEssai (getAdresse(),
 * setTelephone(), etc.), qui délèguent ici de façon transparente.
 */
#[ORM\Entity(repositoryClass: SeanceEssaiCoordonneesRepository::class)]
#[ORM\Table(name: 'seance_essai_coordonnees')]
class SeanceEssaiCoordonnees
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: SeanceEssai::class, inversedBy: 'coordonnees')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?SeanceEssai $seanceEssai = null;

    #[ORM\Column(type: 'encrypted_string', nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(type: 'encrypted_string', nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: 'encrypted_string', nullable: true)]
    private ?string $responsableTelephone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeanceEssai(): ?SeanceEssai
    {
        return $this->seanceEssai;
    }

    public function setSeanceEssai(?SeanceEssai $seanceEssai): self
    {
        $this->seanceEssai = $seanceEssai;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getResponsableTelephone(): ?string
    {
        return $this->responsableTelephone;
    }

    public function setResponsableTelephone(?string $responsableTelephone): self
    {
        $this->responsableTelephone = $responsableTelephone;
        return $this;
    }
}
