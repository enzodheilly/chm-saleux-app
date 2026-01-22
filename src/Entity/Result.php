<?php

namespace App\Entity;

use App\Repository\ResultRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultRepository::class)]
class Result
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    private $prenom;

    #[ORM\Column(type: "string", length: 255)]
    private $nom; // Nom de l'athlète

    #[ORM\Column(type: "float")]
    private $epauleJete;

    #[ORM\Column(type: "float")]
    private $arracher;

    #[ORM\Column(type: "float")]
    private $total;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $categoriePoids;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $categorie; // Cadette, Senior, etc.

    #[ORM\Column(type: "float", nullable: true)]
    private $point; // Total points

    #[ORM\Column(type: "float", nullable: true)]
    private $pdc; // Poids du corps

    #[ORM\Column(type: "string", length: 50, nullable: true)]
    private $classee; // Régional, Départemental, etc.

    #[ORM\ManyToOne(targetEntity: Competition::class, inversedBy: 'results')]
    #[ORM\JoinColumn(nullable: false)]
    private $competition;

    // ======= GETTERS & SETTERS =======

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
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

    public function getEpauleJete(): ?float
    {
        return $this->epauleJete;
    }
    public function setEpauleJete(float $epauleJete): self
    {
        $this->epauleJete = $epauleJete;
        return $this;
    }

    public function getArracher(): ?float
    {
        return $this->arracher;
    }
    public function setArracher(float $arracher): self
    {
        $this->arracher = $arracher;
        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }
    public function setTotal(float $total): self
    {
        $this->total = $total;
        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }
    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;
        return $this;
    }

    public function getCategoriePoids(): ?string
    {
        return $this->categoriePoids;
    }
    public function setCategoriePoids(?string $categoriePoids): self
    {
        $this->categoriePoids = $categoriePoids;
        return $this;
    }

    public function getPoint(): ?float
    {
        return $this->point;
    }
    public function setPoint(?float $point): self
    {
        $this->point = $point;
        return $this;
    }

    public function getPdc(): ?float
    {
        return $this->pdc;
    }
    public function setPdc(?float $pdc): self
    {
        $this->pdc = $pdc;
        return $this;
    }

    public function getClassee(): ?string
    {
        return $this->classee;
    }
    public function setClassee(?string $classee): self
    {
        $this->classee = $classee;
        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }
    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;
        return $this;
    }
}
