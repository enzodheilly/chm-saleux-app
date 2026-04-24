<?php

namespace App\Entity;

use App\Repository\WorkoutSessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: WorkoutSessionRepository::class)]
class WorkoutSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['session:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['session:read'])]
    private ?User $user = null;

    #[ORM\OneToOne(targetEntity: WorkoutSchedule::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    #[Groups(['session:read', 'session:write'])]
    private ?WorkoutSchedule $workoutSchedule = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['session:read', 'session:write'])]
    private ?int $durationSeconds = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['session:read', 'session:write'])]
    private ?float $totalVolume = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['session:read', 'session:write'])]
    private ?int $totalCompletedSets = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['session:read', 'session:write'])]
    private ?\DateTimeInterface $performedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['session:read', 'session:write'])]
    private ?string $routineName = null;

    #[ORM\ManyToOne(targetEntity: UserRoutine::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    #[Groups(['session:read', 'session:write'])]
    private ?UserRoutine $userRoutine = null;

    public function __construct()
    {
        $this->performedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getWorkoutSchedule(): ?WorkoutSchedule
    {
        return $this->workoutSchedule;
    }

    public function setWorkoutSchedule(?WorkoutSchedule $workoutSchedule): self
    {
        $this->workoutSchedule = $workoutSchedule;
        return $this;
    }

    public function getDurationSeconds(): ?int
    {
        return $this->durationSeconds;
    }

    public function setDurationSeconds(?int $durationSeconds): self
    {
        $this->durationSeconds = $durationSeconds;
        return $this;
    }

    public function getTotalVolume(): ?float
    {
        return $this->totalVolume;
    }

    public function setTotalVolume(?float $totalVolume): self
    {
        $this->totalVolume = $totalVolume;
        return $this;
    }

    public function getTotalCompletedSets(): ?int
    {
        return $this->totalCompletedSets;
    }

    public function setTotalCompletedSets(?int $totalCompletedSets): self
    {
        $this->totalCompletedSets = $totalCompletedSets;
        return $this;
    }

    public function getPerformedAt(): ?\DateTimeInterface
    {
        return $this->performedAt;
    }

    public function setPerformedAt(\DateTimeInterface $performedAt): self
    {
        $this->performedAt = $performedAt;
        return $this;
    }

    public function getRoutineName(): ?string
    {
        return $this->routineName;
    }

    public function setRoutineName(?string $routineName): self
    {
        $this->routineName = $routineName;
        return $this;
    }

    public function getUserRoutine(): ?UserRoutine
    {
        return $this->userRoutine;
    }

    public function setUserRoutine(?UserRoutine $userRoutine): self
    {
        $this->userRoutine = $userRoutine;
        return $this;
    }
}
