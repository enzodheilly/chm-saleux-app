<?php

namespace App\Entity;

use App\Repository\ExerciseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ExerciseRepository::class)]
#[ORM\Table(name: 'exercise')]
class Exercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    // ✅ Ajout de template:read pour que le Player reconnaisse l'ID
    #[Groups(['exercise:read', 'routine:read', 'template:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de l’exercice est obligatoire.')]
    #[Assert\Length(max: 255)]
    // ✅ Ajout de template:read pour afficher le nom dans le Player Flutter
    #[Groups(['exercise:read', 'routine:read', 'template:read'])]
    private ?string $name = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\Length(max: 5000)]
    #[Groups(['exercise:read', 'template:read'])] // Ajouté aussi ici au cas où tu veuilles la description
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Le groupe musculaire est obligatoire.')]
    #[Assert\Length(max: 50)]
    #[Groups(['exercise:read', 'template:read'])]
    private ?string $muscleGroup = null;

    // ✅ Lien vers Equipment
    #[ORM\ManyToOne(targetEntity: Equipment::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    #[Groups(['exercise:read', 'template:read'])]
    private ?Equipment $equipment = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description !== null ? trim($description) : null;
        return $this;
    }

    public function getMuscleGroup(): ?string
    {
        return $this->muscleGroup;
    }

    public function setMuscleGroup(string $muscleGroup): self
    {
        $this->muscleGroup = trim($muscleGroup);
        return $this;
    }

    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): self
    {
        $this->equipment = $equipment;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? '';
    }
}
