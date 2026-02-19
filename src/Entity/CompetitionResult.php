<?php

namespace App\Entity;

use App\Repository\CompetitionResultRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CompetitionResultRepository::class)]
class CompetitionResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "first_name", type: "string", length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private ?string $firstName = null;

    #[ORM\Column(name: "last_name", type: "string", length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private ?string $lastName = null;

    #[ORM\Column(name: "clean_and_jerk", type: "float")]
    #[Assert\PositiveOrZero]
    private float $cleanAndJerk = 0.0;

    #[ORM\Column(type: "float")]
    #[Assert\PositiveOrZero]
    private float $snatch = 0.0;

    #[ORM\Column(type: "float")]
    #[Assert\PositiveOrZero]
    // (Optionnel) garde-fou: total doit matcher la somme
    #[Assert\Expression(
        "this.getTotal() == (this.getSnatch() + this.getCleanAndJerk())",
        message: "Total must equal snatch + clean and jerk."
    )]
    private float $total = 0.0;

    #[ORM\Column(name: "weight_class", type: 'string', length: 50, nullable: true)]
    #[Assert\Length(max: 50)]
    private ?string $weightClass = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    #[Assert\Length(max: 255)]
    private ?string $category = null;

    #[ORM\Column(type: "float", nullable: true)]
    #[Assert\PositiveOrZero]
    private ?float $points = null;

    #[ORM\Column(name: "body_weight", type: "float", nullable: true)]
    #[Assert\Positive]
    private ?float $bodyWeight = null;

    #[ORM\Column(name: "ranking_level", type: "string", length: 50, nullable: true)]
    #[Assert\Length(max: 50)]
    private ?string $rankingLevel = null;

    #[ORM\ManyToOne(targetEntity: Competition::class, inversedBy: 'results')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Competition $competition = null;

    // ======= GETTERS & SETTERS =======

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = trim($firstName);
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = trim($lastName);
        return $this;
    }

    public function getCleanAndJerk(): float
    {
        return $this->cleanAndJerk;
    }

    public function setCleanAndJerk(float $cleanAndJerk): self
    {
        $this->cleanAndJerk = max(0.0, $cleanAndJerk);
        $this->recalculateTotal();
        return $this;
    }

    public function getSnatch(): float
    {
        return $this->snatch;
    }

    public function setSnatch(float $snatch): self
    {
        $this->snatch = max(0.0, $snatch);
        $this->recalculateTotal();
        return $this;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    // ✅ on supprime le setter pour éviter les incohérences
    // public function setTotal(float $total): self { ... }

    public function getWeightClass(): ?string
    {
        return $this->weightClass;
    }

    public function setWeightClass(?string $weightClass): self
    {
        $this->weightClass = $weightClass ? trim($weightClass) : null;
        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category ? trim($category) : null;
        return $this;
    }

    public function getPoints(): ?float
    {
        return $this->points;
    }

    public function setPoints(?float $points): self
    {
        $this->points = ($points === null) ? null : max(0.0, $points);
        return $this;
    }

    public function getBodyWeight(): ?float
    {
        return $this->bodyWeight;
    }

    public function setBodyWeight(?float $bodyWeight): self
    {
        $this->bodyWeight = $bodyWeight;
        return $this;
    }

    public function getRankingLevel(): ?string
    {
        return $this->rankingLevel;
    }

    public function setRankingLevel(?string $rankingLevel): self
    {
        $this->rankingLevel = $rankingLevel ? trim($rankingLevel) : null;
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

    private function recalculateTotal(): void
    {
        $this->total = $this->snatch + $this->cleanAndJerk;
    }
}
