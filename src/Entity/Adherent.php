<?php

namespace App\Entity;

use App\Repository\AdherentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdherentRepository::class)
 */
class Adherent extends User
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $city;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $children;

    /**
     * @ORM\Column(type="date")
     */
    private $registrationDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $upToDateFee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatar;

    /**
     * @ORM\ManyToMany(targetEntity=Animation::class, inversedBy="adherents")
     */
    private $participates;

    /**
     * @ORM\ManyToMany(targetEntity=Media::class, inversedBy="adherents")
     */
    private $likes;

    /**
     * @ORM\OneToMany(targetEntity=Suggestion::class, mappedBy="suggests")
     */
    private $suggestions;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="writtenBy")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=MediaAdherents::class, mappedBy="hasForAdherent")
     */
    private $adherentsMedia;

    /**
     * @ORM\ManyToMany(targetEntity=Media::class, mappedBy="borrowed")
     */
    private $media;

    public function __construct()
    {
        $this->participates = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->suggestions = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->adherentsMedia = new ArrayCollection();
        $this->media = new ArrayCollection();
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

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

    public function getChildren(): ?int
    {
        return $this->children;
    }

    public function setChildren(?int $children): self
    {
        $this->children = $children;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(\DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    public function getUpToDateFee(): ?bool
    {
        return $this->upToDateFee;
    }

    public function setUpToDateFee(bool $upToDateFee): self
    {
        $this->upToDateFee = $upToDateFee;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return Collection|Animation[]
     */
    public function getParticipates(): Collection
    {
        return $this->participates;
    }

    public function addParticipate(Animation $participate): self
    {
        if (!$this->participates->contains($participate)) {
            $this->participates[] = $participate;
        }

        return $this;
    }

    public function removeParticipate(Animation $participate): self
    {
        $this->participates->removeElement($participate);

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Media $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
        }

        return $this;
    }

    public function removeLike(Media $like): self
    {
        $this->likes->removeElement($like);

        return $this;
    }

    /**
     * @return Collection|Suggestion[]
     */
    public function getSuggestions(): Collection
    {
        return $this->suggestions;
    }

    public function addSuggestion(Suggestion $suggestion): self
    {
        if (!$this->suggestions->contains($suggestion)) {
            $this->suggestions[] = $suggestion;
            $suggestion->setSuggests($this);
        }

        return $this;
    }

    public function removeSuggestion(Suggestion $suggestion): self
    {
        if ($this->suggestions->removeElement($suggestion)) {
            // set the owning side to null (unless already changed)
            if ($suggestion->getSuggests() === $this) {
                $suggestion->setSuggests(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setWrittenBy($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getWrittenBy() === $this) {
                $comment->setWrittenBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MediaAdherents[]
     */
    public function getMediaAdherentss(): Collection
    {
        return $this->adherentsMedia;
    }

    public function addMediaAdherents(MediaAdherents $adherentMedia): self
    {
        if (!$this->adherentsMedia->contains($adherentMedia)) {
            $this->adherentsMedia[] = $adherentMedia;
            $adherentMedia->setHasForAdherent($this);
        }

        return $this;
    }

    public function removeMediaAdherents(MediaAdherents $adherentMedia): self
    {
        if ($this->adherentsMedia->removeElement($adherentMedia)) {
            // set the owning side to null (unless already changed)
            if ($adherentMedia->getHasForAdherent() === $this) {
                $adherentMedia->setHasForAdherent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->addBorrowed($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->removeElement($medium)) {
            $medium->removeBorrowed($this);
        }

        return $this;
    }
}
