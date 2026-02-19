<?php

namespace App\Entity;

use App\Repository\RoutineTemplateExerciseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RoutineTemplateExerciseRepository::class)]
#[ORM\Table(name: 'routine_template_exercise')]
#[ORM\UniqueConstraint(name: 'uniq_template_exercise', columns: ['routine_template_id', 'exercise_id'])]
class RoutineTemplateExercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['template:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'templateExercises')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?RoutineTemplate $routineTemplate = null;

    #[ORM\ManyToOne(targetEntity: Exercise::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Groups(['template:read'])]
    private ?Exercise $exercise = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\PositiveOrZero]
    #[Groups(['template:read'])]
    private int $position = 0;

    #[ORM\Column(type: 'integer')]
    #[Assert\Positive]
    #[Groups(['template:read'])]
    private int $sets = 3;

    #[ORM\Column(type: 'integer')]
    #[Assert\Positive]
    #[Groups(['template:read'])]
    private int $repsMin = 8;

    #[ORM\Column(type: 'integer')]
    #[Assert\Positive]
    #[Groups(['template:read'])]
    private int $repsMax = 12;

    #[ORM\Column(type: 'integer')]
    #[Assert\Positive]
    #[Groups(['template:read'])]
    private int $restSeconds = 90;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\Range(min: 0, max: 5)]
    #[Groups(['template:read'])]
    private ?int $rir = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['template:read'])]
    private ?string $notes = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getExercise(): ?Exercise
    {
        return $this->exercise;
    }

    public function setExercise(?Exercise $exercise): self
    {
        $this->exercise = $exercise;
        return $this;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function getSets(): int
    {
        return $this->sets;
    }

    public function setSets(int $sets): self
    {
        $this->sets = $sets;
        return $this;
    }

    public function getRepsMin(): int
    {
        return $this->repsMin;
    }

    public function setRepsMin(int $repsMin): self
    {
        $this->repsMin = $repsMin;
        return $this;
    }

    public function getRepsMax(): int
    {
        return $this->repsMax;
    }

    public function setRepsMax(int $repsMax): self
    {
        $this->repsMax = $repsMax;
        return $this;
    }

    public function getRestSeconds(): int
    {
        return $this->restSeconds;
    }

    public function setRestSeconds(int $restSeconds): self
    {
        $this->restSeconds = $restSeconds;
        return $this;
    }

    public function getRir(): ?int
    {
        return $this->rir;
    }

    public function setRir(?int $rir): self
    {
        $this->rir = $rir;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;
        return $this;
    }
}
