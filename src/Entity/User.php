<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $registratedAt = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?bool $isAcceptedTerms = null;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Twit::class, orphanRemoval: true)]
    private Collection $twits;

    public function __construct()
    {
        $this->twits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getRegistratedAt(): ?\DateTimeImmutable
    {
        return $this->registratedAt;
    }

    public function setRegistratedat(\DateTimeImmutable $registratedAt): self
    {
        $this->registratedAt = $registratedAt;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function isIsAcceptedTerms(): ?bool
    {
        return $this->isAcceptedTerms;
    }

    public function setIsAcceptedTerms(bool $isAcceptedTerms): self
    {
        $this->isAcceptedTerms = $isAcceptedTerms;

        return $this;
    }

    /**
     * @return Collection<int, Twit>
     */
    public function getTwits(): Collection
    {
        return $this->twits;
    }

    public function addTwit(Twit $twit): self
    {
        if (!$this->twits->contains($twit)) {
            $this->twits->add($twit);
            $twit->setAuthor($this);
        }

        return $this;
    }

    public function removeTwit(Twit $twit): self
    {
        if ($this->twits->removeElement($twit)) {
            // set the owning side to null (unless already changed)
            if ($twit->getAuthor() === $this) {
                $twit->setAuthor(null);
            }
        }

        return $this;
    }
}
