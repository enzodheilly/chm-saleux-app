<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    private $titre;

    #[ORM\Column(type: "datetime")]
    private $date;

    #[ORM\Column(type: "string", length: 10, nullable: true)]
    private ?string $classementEquipe = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $lieu;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $equipe; // 'male' ou 'female'

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $type; // type de compétition (ex: Régionale, Coupe de France)

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $image; // nom du fichier ou chemin de l'image

    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: Result::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private $results;

    #[ORM\ManyToMany(targetEntity: Athlete::class, inversedBy: "competitions")]
    private Collection $athletes;

    public function __construct()
    {
        $this->results = new ArrayCollection();
        $this->athletes = new ArrayCollection();
    }

    // ======= GETTERS & SETTERS =======

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;
        return $this;
    }

    public function getEquipe(): ?string
    {
        return $this->equipe;
    }

    public function setEquipe(?string $equipe): self
    {
        $this->equipe = $equipe;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Collection|Result[]
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(Result $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results[] = $result;
            $result->setCompetition($this);
        }
        return $this;
    }

    public function removeResult(Result $result): self
    {
        if ($this->results->removeElement($result)) {
            if ($result->getCompetition() === $this) {
                $result->setCompetition(null);
            }
        }
        return $this;
    }

    // ======= RELATION ATHLETES =======

    /**
     * @return Collection|Athlete[]
     */
    public function getAthletes(): Collection
    {
        return $this->athletes;
    }

    public function addAthlete(Athlete $athlete): self
    {
        if (!$this->athletes->contains($athlete)) {
            $this->athletes[] = $athlete;
            $athlete->addCompetition($this);
        }
        return $this;
    }

    public function removeAthlete(Athlete $athlete): self
    {
        if ($this->athletes->removeElement($athlete)) {
            $athlete->removeCompetition($this);
        }
        return $this;
    }

    public function getClassementEquipe(): ?string
    {
        return $this->classementEquipe;
    }

    public function setClassementEquipe(?string $classementEquipe): self
    {
        $this->classementEquipe = $classementEquipe;
        return $this;
    }
}
