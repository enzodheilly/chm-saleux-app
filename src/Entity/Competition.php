<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
#[ORM\Index(columns: ['event_date'], name: 'idx_competition_event_date')]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank(message: "Title is required.")]
    #[Assert\Length(max: 255)]
    private ?string $title = null;

    #[ORM\Column(name: "event_date", type: "datetime")]
    #[Assert\NotNull(message: "Event date is required.")]
    private ?\DateTimeInterface $eventDate = null;

    #[ORM\Column(name: "team_ranking", type: "string", length: 10, nullable: true)]
    #[Assert\Length(max: 10)]
    private ?string $teamRanking = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    #[Assert\Length(max: 255)]
    private ?string $location = null;

    #[ORM\Column(type: "string", length: 10, nullable: true)]
    #[Assert\Choice(choices: ["female", "male"], message: "Gender must be 'female' or 'male'.")]
    private ?string $gender = null;

    #[ORM\Column(name: "competition_type", type: "string", length: 255, nullable: true)]
    #[Assert\Length(max: 255)]
    private ?string $competitionType = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    #[Assert\Length(max: 255)]
    private ?string $image = null;

    /**
     * @var Collection<int, CompetitionResult>
     */
    #[ORM\OneToMany(
        mappedBy: 'competition',
        targetEntity: CompetitionResult::class,
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    private Collection $results;

    /**
     * @var Collection<int, Athlete>
     */
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = trim($title);
        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->eventDate;
    }

    public function setEventDate(\DateTimeInterface $eventDate): self
    {
        $this->eventDate = $eventDate;
        return $this;
    }

    public function getTeamRanking(): ?string
    {
        return $this->teamRanking;
    }

    public function setTeamRanking(?string $teamRanking): self
    {
        $this->teamRanking = $teamRanking ? trim($teamRanking) : null;
        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location ? trim($location) : null;
        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender ? strtolower(trim($gender)) : null;
        return $this;
    }

    public function getCompetitionType(): ?string
    {
        return $this->competitionType;
    }

    public function setCompetitionType(?string $competitionType): self
    {
        $this->competitionType = $competitionType ? trim($competitionType) : null;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image ? basename($image) : null;
        return $this;
    }

    /**
     * @return Collection<int, CompetitionResult>
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(CompetitionResult $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results->add($result);
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

    /**
     * @return Collection<int, Athlete>
     */
    public function getAthletes(): Collection
    {
        return $this->athletes;
    }

    public function addAthlete(Athlete $athlete): self
    {
        if (!$this->athletes->contains($athlete)) {
            $this->athletes->add($athlete);
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
}
