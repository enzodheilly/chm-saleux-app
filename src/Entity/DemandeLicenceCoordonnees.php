<?php

namespace App\Entity;

use App\Repository\DemandeLicenceCoordonneesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Coordonnées personnelles sensibles d'une demande de licence (adresse,
 * téléphones), isolées dans leur propre table et chiffrées au repos (voir
 * App\Doctrine\EncryptedStringType) : même en cas de fuite de la seule base
 * de données (export, sauvegarde volée...), ces valeurs restent illisibles
 * sans la clé DATA_ENCRYPTION_KEY, qui n'existe que dans le .env du serveur
 * (jamais dans Git, jamais dans une sauvegarde de la base).
 *
 * Toujours manipulée via les accesseurs de DemandeLicence (getAdresse(),
 * setTelephone(), etc.), qui délèguent ici de façon transparente — aucun
 * autre fichier n'a besoin de connaître l'existence de cette entité.
 */
#[ORM\Entity(repositoryClass: DemandeLicenceCoordonneesRepository::class)]
#[ORM\Table(name: 'demande_licence_coordonnees')]
class DemandeLicenceCoordonnees
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: DemandeLicence::class, inversedBy: 'coordonnees')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?DemandeLicence $demandeLicence = null;

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

    public function getDemandeLicence(): ?DemandeLicence
    {
        return $this->demandeLicence;
    }

    public function setDemandeLicence(?DemandeLicence $demandeLicence): self
    {
        $this->demandeLicence = $demandeLicence;
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
