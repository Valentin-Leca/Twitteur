<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LikeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikeRepository::class)]
#[ORM\Table(name: '`like`')]
#[ApiResource]
class Like
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Twit $twit = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $who = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $likeAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTwit(): ?Twit
    {
        return $this->twit;
    }

    public function setTwit(?Twit $twit): self
    {
        $this->twit = $twit;

        return $this;
    }

    public function getWho(): ?User
    {
        return $this->who;
    }

    public function setWho(?User $who): self
    {
        $this->who = $who;

        return $this;
    }

    public function getLikeAt(): ?\DateTimeImmutable
    {
        return $this->likeAt;
    }

    public function setLikeAt(\DateTimeImmutable $likeAt): self
    {
        $this->likeAt = $likeAt;

        return $this;
    }
}
