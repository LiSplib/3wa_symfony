<?php

namespace App\Entity;

use App\Repository\ContributorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContributorRepository::class)
 */
class Contributor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $deathDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $biography;

    /**
     * @ORM\OneToMany(targetEntity=MediaContributor::class, mappedBy="hasForContributor")
     */
    private $mediaContributors;

    /**
     * @ORM\ManyToMany(targetEntity=Animation::class, inversedBy="contributors")
     */
    private $invited;

    public function __construct()
    {
        $this->mediaContributors = new ArrayCollection();
        $this->invited = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getDeathDate(): ?\DateTimeInterface
    {
        return $this->deathDate;
    }

    public function setDeathDate(\DateTimeInterface $deathDate): self
    {
        $this->deathDate = $deathDate;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * @return Collection|MediaContributor[]
     */
    public function getMediaContributors(): Collection
    {
        return $this->mediaContributors;
    }

    public function addMediaContributor(MediaContributor $mediaContributor): self
    {
        if (!$this->mediaContributors->contains($mediaContributor)) {
            $this->mediaContributors[] = $mediaContributor;
            $mediaContributor->setHasForContributor($this);
        }

        return $this;
    }

    public function removeMediaContributor(MediaContributor $mediaContributor): self
    {
        if ($this->mediaContributors->removeElement($mediaContributor)) {
            // set the owning side to null (unless already changed)
            if ($mediaContributor->getHasForContributor() === $this) {
                $mediaContributor->setHasForContributor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Animation[]
     */
    public function getInvited(): Collection
    {
        return $this->invited;
    }

    public function addInvited(Animation $invited): self
    {
        if (!$this->invited->contains($invited)) {
            $this->invited[] = $invited;
        }

        return $this;
    }

    public function removeInvited(Animation $invited): self
    {
        $this->invited->removeElement($invited);

        return $this;
    }
}
