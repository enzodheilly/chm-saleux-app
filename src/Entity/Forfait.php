<?php

namespace App\Entity;

use App\Repository\ForfaitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForfaitRepository::class)]
class Forfait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $prix = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $mensualite = null;

    // NOUVEAU : Pour définir si c'est "/mois", "/an", "/trimestre"
    #[ORM\Column(length: 20)]
    private ?string $frequence = null;

    // NOUVEAU : Le badge "Populaire"
    #[ORM\Column(type: 'boolean')]
    private bool $isPopular = false;

    // On garde le JSON, mais on le gérera comme du texte dans le formulaire
    #[ORM\Column(type: 'json')]
    private array $avantages = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getFrequence(): ?string
    {
        return $this->frequence;
    }

    public function setFrequence(string $frequence): self
    {
        $this->frequence = $frequence;
        return $this;
    }

    public function isPopular(): bool
    {
        return $this->isPopular;
    }

    public function setIsPopular(bool $isPopular): self
    {
        $this->isPopular = $isPopular;
        return $this;
    }

    public function getAvantages(): array
    {
        return $this->avantages;
    }

    public function setAvantages(array $avantages): self
    {
        $this->avantages = $avantages;
        return $this;
    }

    public function getMensualite(): ?string
    {
        return $this->mensualite;
    }

    public function setMensualite(?string $mensualite): self
    {
        $this->mensualite = $mensualite;
        return $this;
    }
}
