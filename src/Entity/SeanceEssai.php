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
}
