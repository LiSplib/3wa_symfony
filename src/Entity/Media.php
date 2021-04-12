<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 * @ORM\Table(name="`media`")
 * @ORM\DiscriminatorMap({"Media"="Media", "CD"="CD", "DVD"="DVD", "Journal"="Journal", "Book"="Book"})
 * @ORM\DiscriminatorColumn(name="mediaType", type="string")
 * @ORM\InheritanceType("JOINED")
 */
class Media
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
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $support;

    /**
     * @ORM\Column(type="datetime")
     */
    private $acquisitionDate;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cote;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $illustration;

    /**
     * @ORM\Column(type="text")
     */
    private $presentation;

    /**
     * @ORM\ManyToMany(targetEntity=Adherent::class, mappedBy="likes")
     */
    private $adherents;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="isAbout")
     */
    private $comments;

    /**
<<<<<<< HEAD
=======
     * @ORM\OneToMany(targetEntity=MediaAdherents::class, mappedBy="hasForMedia")
     */
    private $mediaAdherents;

    /**
>>>>>>> 0c2a4d36e73bde1f265f56827b04f235c094ce3a
     * @ORM\ManyToMany(targetEntity=Adherent::class, inversedBy="media")
     */
    private $borrowed;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="media")
     */
    private $likes;

    /**
     * @ORM\OneToMany(targetEntity=MediaContributor::class, mappedBy="hasForMedia")
     */
    private $mediaContributors;

    /**
     * @ORM\OneToMany(targetEntity=Resource::class, mappedBy="relatedTo")
     */
    private $resources;

    public function __construct()
    {
        $this->adherents = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->mediaAdherents = new ArrayCollection();
        $this->borrowed = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->mediaContributors = new ArrayCollection();
        $this->resources = new ArrayCollection();
    }

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

    public function getSupport(): ?int
    {
        return $this->support;
    }

    public function setSupport(int $support): self
    {
        $this->support = $support;

        return $this;
    }

    public function getAcquisitionDate(): ?\DateTimeInterface
    {
        return $this->acquisitionDate;
    }

    public function setAcquisitionDate(\DateTimeInterface $acquisitionDate): self
    {
        $this->acquisitionDate = $acquisitionDate;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getCote(): ?string
    {
        return $this->cote;
    }

    public function setCote(string $cote): self
    {
        $this->cote = $cote;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * @return Collection|Adherent[]
     */
    public function getAdherents(): Collection
    {
        return $this->adherents;
    }

    public function addAdherent(Adherent $adherent): self
    {
        if (!$this->adherents->contains($adherent)) {
            $this->adherents[] = $adherent;
            $adherent->addLike($this);
        }

        return $this;
    }

    public function removeAdherent(Adherent $adherent): self
    {
        if ($this->adherents->removeElement($adherent)) {
            $adherent->removeLike($this);
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
            $comment->setIsAbout($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getIsAbout() === $this) {
                $comment->setIsAbout(null);
            }
        }

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * @return Collection|MediaAdherents[]
     */
    public function getMediaAdherentss(): Collection
    {
        return $this->mediaAdherents;
    }

    public function addMediaAdherents(MediaAdherents $mediaAdherent): self
    {
        if (!$this->mediaAdherents->contains($mediaAdherent)) {
            $this->mediaAdherents[] = $mediaAdherent;
            $mediaAdherent->setHasForMedia($this);
        }

        return $this;
    }

    public function removeMediaAdherents(MediaAdherents $mediaAdherent): self
    {
        if ($this->mediaAdherents->removeElement($mediaAdherent)) {
            // set the owning side to null (unless already changed)
            if ($mediaAdherent->getHasForMedia() === $this) {
                $mediaAdherent->setHasForMedia(null);
            }
        }

        return $this;
    }

    /**
>>>>>>> 0c2a4d36e73bde1f265f56827b04f235c094ce3a
     * @return Collection|Adherent[]
     */
    public function getBorrowed(): Collection
    {
        return $this->borrowed;
    }

    public function addBorrowed(Adherent $borrowed): self
    {
        if (!$this->borrowed->contains($borrowed)) {
            $this->borrowed[] = $borrowed;
        }

        return $this;
    }

    public function removeBorrowed(Adherent $borrowed): self
    {
        $this->borrowed->removeElement($borrowed);

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(User $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
        }

        return $this;
    }

    public function removeLike(User $like): self
    {
        $this->likes->removeElement($like);

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
            $mediaContributor->setHasForMedia($this);
        }

        return $this;
    }

    public function removeMediaContributor(MediaContributor $mediaContributor): self
    {
        if ($this->mediaContributors->removeElement($mediaContributor)) {
            // set the owning side to null (unless already changed)
            if ($mediaContributor->getHasForMedia() === $this) {
                $mediaContributor->setHasForMedia(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Resource[]
     */
    public function getResources(): Collection
    {
        return $this->resources;
    }

    public function addResource(Resource $resource): self
    {
        if (!$this->resources->contains($resource)) {
            $this->resources[] = $resource;
            $resource->setRelatedTo($this);
        }

        return $this;
    }

    public function removeResource(Resource $resource): self
    {
        if ($this->resources->removeElement($resource)) {
            // set the owning side to null (unless already changed)
            if ($resource->getRelatedTo() === $this) {
                $resource->setRelatedTo(null);
            }
        }

        return $this;
    }
}
