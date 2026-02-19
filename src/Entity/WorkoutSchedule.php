<?php

namespace App\Entity;

use App\Repository\WorkoutScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: WorkoutScheduleRepository::class)]
class WorkoutSchedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['schedule:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: RoutineTemplate::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['schedule:read'])]
    private ?RoutineTemplate $routineTemplate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['schedule:read'])]
    private ?\DateTimeInterface $scheduledDate = null;

    #[ORM\Column(options: ['default' => false])]
    #[Groups(['schedule:read'])]
    private bool $isCompleted = false;

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

    public function getRoutineTemplate(): ?RoutineTemplate
    {
        return $this->routineTemplate;
    }

    public function setRoutineTemplate(?RoutineTemplate $routineTemplate): self
    {
        $this->routineTemplate = $routineTemplate;
        return $this;
    }

    public function getScheduledDate(): ?\DateTimeInterface
    {
        return $this->scheduledDate;
    }

    public function setScheduledDate(\DateTimeInterface $scheduledDate): self
    {
        $this->scheduledDate = $scheduledDate;
        return $this;
    }

    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }

    public function setIsCompleted(bool $isCompleted): self
    {
        $this->isCompleted = $isCompleted;
        return $this;
    }
}
