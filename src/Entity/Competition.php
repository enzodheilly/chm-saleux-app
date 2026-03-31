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
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $title = null;

    #[ORM\Column(name: "competition_type", type: "string", length: 100, nullable: true)]
    private ?string $competitionType = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $location = null;

    #[ORM\Column(type: "string", length: 10, nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(name: "team_ranking", type: "string", length: 50, nullable: true)]
    private ?string $teamRanking = null;

    #[ORM\Column(name: "event_date", type: "datetime_immutable")]
    private ?\DateTimeImmutable $eventDate = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: "competition", targetEntity: CompetitionResult::class, cascade: ["persist", "remove"])]
    private Collection $results;

    public function __construct()
    {
        $this->results = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getCompetitionType(): ?string
    {
        return $this->competitionType;
    }
    public function setCompetitionType(?string $competitionType): self
    {
        $this->competitionType = $competitionType;
        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }
    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }
    public function setGender(?string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function getTeamRanking(): ?string
    {
        return $this->teamRanking;
    }
    public function setTeamRanking(?string $teamRanking): self
    {
        $this->teamRanking = $teamRanking;
        return $this;
    }

    public function getEventDate(): ?\DateTimeImmutable
    {
        return $this->eventDate;
    }
    public function setEventDate(\DateTimeImmutable $eventDate): self
    {
        $this->eventDate = $eventDate;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(CompetitionResult $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results[] = $result;
            $result->setCompetition($this);
        }
        return $this;
    }

    public function removeResult(CompetitionResult $result): self
    {
        if ($this->results->removeElement($result)) {
            if ($result->getCompetition() === $this) {
                $result->setCompetition(null);
            }
        }
        return $this;
    }
}
