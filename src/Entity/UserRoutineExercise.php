<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
#[ORM\Table(name: 'user_routine_exercise')]
class UserRoutineExercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['custom_routine:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: UserRoutine::class, inversedBy: 'routineExercises')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?UserRoutine $routine = null;

    #[ORM\ManyToOne(targetEntity: Exercise::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Exercise $exercise = null;

    #[ORM\Column(name: 'exercise_order')]
    #[Groups(['custom_routine:read'])]
    private int $exerciseOrder = 1;

    #[ORM\Column]
    #[Groups(['custom_routine:read'])]
    private int $sets = 3;

    #[ORM\Column]
    #[Groups(['custom_routine:read'])]
    private int $reps = 10;

    #[ORM\Column]
    #[Groups(['custom_routine:read'])]
    private int $restSec = 60;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoutine(): ?UserRoutine
    {
        return $this->routine;
    }

    public function setRoutine(?UserRoutine $routine): self
    {
        $this->routine = $routine;
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

    public function getExerciseOrder(): int
    {
        return $this->exerciseOrder;
    }

    public function setExerciseOrder(int $exerciseOrder): self
    {
        $this->exerciseOrder = max(1, $exerciseOrder);
        return $this;
    }

    public function getSets(): int
    {
        return $this->sets;
    }

    public function setSets(int $sets): self
    {
        $this->sets = max(1, $sets);
        return $this;
    }

    public function getReps(): int
    {
        return $this->reps;
    }

    public function setReps(int $reps): self
    {
        $this->reps = max(1, $reps);
        return $this;
    }

    public function getRestSec(): int
    {
        return $this->restSec;
    }

    public function setRestSec(int $restSec): self
    {
        $this->restSec = max(0, $restSec);
        return $this;
    }
}
