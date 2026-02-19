<?php

namespace App\Entity;

use App\Repository\RoutineTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RoutineTemplateRepository::class)]
#[ORM\Table(name: 'routine_template')]
class RoutineTemplate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['template:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom du template est obligatoire.')]
    #[Assert\Length(max: 255)]
    #[Groups(['template:read'])]
    private ?string $name = null;

    // prise_de_masse | perte_de_poids | renfo
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['prise_de_masse', 'perte_de_poids', 'renfo'], message: 'Objectif invalide.')]
    #[Groups(['template:read'])]
    private ?string $goal = null;

    // debutant | intermediaire | avance
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['debutant', 'intermediaire', 'avance'], message: 'Niveau invalide.')]
    #[Groups(['template:read'])]
    private ?string $level = null;

    // Pectoraux / Dos / Jambes / Abdos / FullBody / Push / Pull / Legs ...
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 50)]
    #[Groups(['template:read'])]
    private ?string $muscleGroup = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\Positive(message: 'La durée doit être positive.')]
    #[Groups(['template:read'])]
    private ?int $estimatedDurationMin = null;

    #[ORM\Column(options: ['default' => true])]
    #[Groups(['template:read'])]
    private bool $isPublished = true;

    /**
     * @var Collection<int, RoutineTemplateExercise>
     */
    #[ORM\OneToMany(mappedBy: 'routineTemplate', targetEntity: RoutineTemplateExercise::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\OrderBy(['position' => 'ASC'])]
    #[Groups(['template:read'])]
    private Collection $templateExercises;

    public function __construct()
    {
        $this->templateExercises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getGoal(): ?string
    {
        return $this->goal;
    }

    public function setGoal(string $goal): self
    {
        $this->goal = $goal;
        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;
        return $this;
    }

    public function getMuscleGroup(): ?string
    {
        return $this->muscleGroup;
    }

    public function setMuscleGroup(string $muscleGroup): self
    {
        $this->muscleGroup = $muscleGroup;
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

    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;
        return $this;
    }

    /**
     * @return Collection<int, RoutineTemplateExercise>
     */
    public function getTemplateExercises(): Collection
    {
        return $this->templateExercises;
    }

    public function addTemplateExercise(RoutineTemplateExercise $templateExercise): self
    {
        if (!$this->templateExercises->contains($templateExercise)) {
            $this->templateExercises->add($templateExercise);
            $templateExercise->setRoutineTemplate($this);
        }

        return $this;
    }

    public function removeTemplateExercise(RoutineTemplateExercise $templateExercise): self
    {
        if ($this->templateExercises->removeElement($templateExercise)) {
            if ($templateExercise->getRoutineTemplate() === $this) {
                $templateExercise->setRoutineTemplate(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? 'RoutineTemplate';
    }
}
