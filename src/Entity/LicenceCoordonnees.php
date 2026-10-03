<?php

namespace App\Entity;

use App\Repository\LicenceCoordonneesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Coordonnées personnelles sensibles d'une licence (adresse), isolées dans
 * leur propre table et chiffrées au repos — voir le commentaire de
 * App\Entity\DemandeLicenceCoordonnees pour le détail du pourquoi.
 *
 * Toujours manipulée via Licence::getAdresse()/setAdresse(), qui délèguent
 * ici de façon transparente.
 */
#[ORM\Entity(repositoryClass: LicenceCoordonneesRepository::class)]
#[ORM\Table(name: 'licence_coordonnees')]
class LicenceCoordonnees
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: Licence::class, inversedBy: 'coordonnees')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Licence $licence = null;

    #[ORM\Column(type: 'encrypted_string', nullable: true)]
    private ?string $adresse = null;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }
}
