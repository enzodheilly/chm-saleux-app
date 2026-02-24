<?php

namespace App\Entity;

use App\Repository\UserRoutineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRoutineRepository::class)]
#[ORM\Table(name: 'user_routine')]
class UserRoutine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['custom_routine:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de la routine est obligatoire.')]
    #[Assert\Length(max: 255)]
    #[Groups(['custom_routine:read'])]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['custom_routine:read'])]
    private ?int $estimatedDurationMin = null;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['custom_routine:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * @var Collection<int, UserRoutineExercise>
     */
    #[ORM\OneToMany(
        mappedBy: 'routine',
        targetEntity: UserRoutineExercise::class,
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    #[ORM\OrderBy(['exerciseOrder' => 'ASC'])]
    private Collection $routineExercises;

    public function __construct()
    {
        $this->routineExercises = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = trim($name);
        return $this;
    }

    public function getEstimatedDurationMin(): ?int
    {
        return $this->estimatedDurationMin;
    }

    public function setEstimatedDurationMin(?int $estimatedDurationMin): self
    {
        $this->estimatedDurationMin = $estimatedDurationMin;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Collection<int, UserRoutineExercise>
     */
    public function getRoutineExercises(): Collection
    {
        return $this->routineExercises;
    }

    public function addRoutineExercise(UserRoutineExercise $routineExercise): self
    {
        if (!$this->routineExercises->contains($routineExercise)) {
            $this->routineExercises->add($routineExercise);
            $routineExercise->setRoutine($this);
        }

        return $this;
    }

    public function removeRoutineExercise(UserRoutineExercise $routineExercise): self
    {
        if ($this->routineExercises->removeElement($routineExercise)) {
            if ($routineExercise->getRoutine() === $this) {
                $routineExercise->setRoutine(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? '';
    }
}
