<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\User;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $startTime = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $endTime = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: "events")]
    private Collection $attendees;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: UserEvent::class, cascade: ['persist', 'remove'])]
    private Collection $userEvents;

    public function __construct()
    {
        $this->attendees = new ArrayCollection();
        $this->userEvents = new ArrayCollection();
    }

    // 🔹 Getters et setters classiques
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(?\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(?\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;
        return $this;
    }

    // 🔹 Calcul des dates/horaires combinés
    public function getStartAt(): ?\DateTimeInterface
    {
        if (!$this->date || !$this->startTime) return null;

        $startAt = clone $this->date;
        $startAt->setTime((int)$this->startTime->format('H'), (int)$this->startTime->format('i'));
        return $startAt;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        if (!$this->date || !$this->endTime) return null;

        $endAt = clone $this->date;
        $endAt->setTime((int)$this->endTime->format('H'), (int)$this->endTime->format('i'));
        return $endAt;
    }

    // 🔹 Gestion des participants
    /**
     * @return Collection|User[]
     */
    public function getAttendees(): Collection
    {
        return $this->attendees;
    }

    public function addAttendee(User $user): self
    {
        if (!$this->attendees->contains($user)) {
            $this->attendees->add($user);
            $user->addEvent($this); // Synchronisation
        }
        return $this;
    }

    public function removeAttendee(User $user): self
    {
        if ($this->attendees->removeElement($user)) {
            $user->removeEvent($this); // Synchronisation
        }
        return $this;
    }

    public function getConfirmedAttendees(): Collection
    {
        return $this->userEvents->filter(fn($ue) => $ue->getStatus() === 'confirmed')->map(fn($ue) => $ue->getUser());
    }

    // Méthodes pour le template
    public function isUserPending(User $user): bool
    {
        foreach ($this->userEvents as $ue) {
            if ($ue->getUser() === $user && $ue->getStatus() === 'pending') {
                return true;
            }
        }
        return false;
    }

    public function isUserConfirmed(User $user): bool
    {
        foreach ($this->userEvents as $ue) {
            if ($ue->getUser() === $user && $ue->getStatus() === 'confirmed') {
                return true;
            }
        }
        return false;
    }
}
