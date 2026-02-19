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
    #[Groups(['routine:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    #[ORM\Column(length: 15)]
    #[Assert\NotBlank(message: 'Le jour est obligatoire.')]
    #[Assert\Choice(
        choices: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        message: 'Jour invalide.'
    )]
    #[Groups(['routine:read'])]
    private ?string $dayOfWeek = null; // "Monday", "Friday", etc.

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de la routine est obligatoire.')]
    #[Assert\Length(max: 255)]
    #[Groups(['routine:read'])]
    private ?string $name = null; // Ex: "Ma séance Dos"

    #[ORM\ManyToMany(targetEntity: Exercise::class)]
    #[ORM\JoinTable(name: 'user_routine_exercise')]
    #[Groups(['routine:read'])]
    private Collection $exercises;

    public function __construct()
    {
        $this->exercises = new ArrayCollection();
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

    public function getDayOfWeek(): ?string
    {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek(string $dayOfWeek): self
    {
        $this->dayOfWeek = $dayOfWeek;
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

    /**
     * @return Collection<int, Exercise>
     */
    public function getExercises(): Collection
    {
        return $this->exercises;
    }

    public function addExercise(Exercise $exercise): self
    {
        if (!$this->exercises->contains($exercise)) {
            $this->exercises->add($exercise);
        }

        return $this;
    }

    public function removeExercise(Exercise $exercise): self
    {
        $this->exercises->removeElement($exercise);
        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? '';
    }
}
