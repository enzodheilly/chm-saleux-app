<?php

namespace App\Entity;

use App\Repository\AthleteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AthleteRepository::class)]
#[ORM\Index(columns: ['last_name', 'first_name'], name: 'idx_athlete_name')]
#[ORM\UniqueConstraint(name: 'uniq_athlete_identity', columns: ['first_name', 'last_name', 'birth_date'])]

class Athlete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "first_name", type: "string", length: 100)]
    #[Assert\NotBlank(message: "First name is required.")]
    #[Assert\Length(max: 100)]
    private ?string $firstName = null;

    #[ORM\Column(name: "last_name", type: "string", length: 100)]
    #[Assert\NotBlank(message: "Last name is required.")]
    #[Assert\Length(max: 100)]
    private ?string $lastName = null;

    #[ORM\Column(name: "birth_date", type: "date", nullable: true)]
    #[Assert\LessThanOrEqual("today", message: "Birth date cannot be in the future.")]
    private ?\DateTimeInterface $birthDate = null;

    // Stocke uniquement un nom de fichier (pas un chemin complet)
    #[ORM\Column(type: "string", length: 255, nullable: true)]
    #[Assert\Length(max: 255)]
    private ?string $image = null;

    #[ORM\Column(type: "integer", options: ["default" => 0])]
    #[Assert\PositiveOrZero(message: "Points must be zero or positive.")]
    private int $points = 0;

    #[ORM\Column(name: "weight_class", type: "string", length: 50, nullable: true)]
    #[Assert\Length(max: 50)]
    private ?string $weightClass = null;

    // Ex: "junior", "senior", "elite" (ou "kata", "kumite" etc selon ton sport)
    #[ORM\Column(type: "string", length: 50, nullable: true)]
    #[Assert\Length(max: 50)]
    private ?string $category = null;

    // Vu ton commentaire female/male -> le terme correct est "gender"
    #[ORM\Column(type: "string", length: 10)]
    #[Assert\NotBlank]
    #[Assert\Choice(choices: ["female", "male"], message: "Gender must be 'female' or 'male'.")]
    private ?string $gender = null;

    #[ORM\ManyToMany(targetEntity: Competition::class, mappedBy: "athletes")]
    private Collection $competitions;

    public function __construct()
    {
        $this->competitions = new ArrayCollection();
    }

    // --- Getters & Setters ---

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

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        // sécurité simple: on stocke seulement le nom de fichier
        $this->image = $image ? basename($image) : null;
        return $this;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = max(0, $points);
        return $this;
    }

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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = strtolower(trim($gender));
        return $this;
    }

    /**
     * @return Collection<int, Competition>
     */
    public function getCompetitions(): Collection
    {
        return $this->competitions;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->competitions->contains($competition)) {
            $this->competitions->add($competition);
            $competition->addAthlete($this);
        }
        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competitions->removeElement($competition)) {
            $competition->removeAthlete($this);
        }
        return $this;
    }

    public function getFullName(): string
    {
        return trim(($this->firstName ?? '') . ' ' . ($this->lastName ?? ''));
    }
}
