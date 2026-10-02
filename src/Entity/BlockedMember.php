<?php

namespace App\Entity;

use App\Repository\BlockedMemberRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Personne interdite de reprendre une licence en ligne (mauvais payeur, exclusion
 * disciplinaire, etc.). Le rapprochement se fait sur nom + prénom au moment de la
 * demande (voir BlockedMemberRepository::isBlocked) — ce n'est donc qu'un premier
 * filtre : le bureau garde la main en cas d'homonymie ou de changement de nom.
 */
#[ORM\Entity(repositoryClass: BlockedMemberRepository::class)]
#[ORM\Table(name: 'blocked_members')]
class BlockedMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private string $nom = '';

    #[ORM\Column(length: 100)]
    private string $prenom = '';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $raison = null;

    #[ORM\Column]
    private \DateTimeImmutable $blockedAt;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $blockedBy = null;

    public function __construct()
    {
        $this->blockedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(?string $raison): self
    {
        $this->raison = $raison;
        return $this;
    }

    public function getBlockedAt(): \DateTimeImmutable
    {
        return $this->blockedAt;
    }

    public function setBlockedAt(\DateTimeImmutable $blockedAt): self
    {
        $this->blockedAt = $blockedAt;
        return $this;
    }

    public function getBlockedBy(): ?string
    {
        return $this->blockedBy;
    }

    public function setBlockedBy(?string $blockedBy): self
    {
        $this->blockedBy = $blockedBy;
        return $this;
    }
}
