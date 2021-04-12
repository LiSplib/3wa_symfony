<?php

namespace App\Entity;

use App\Repository\MediaContributorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaContributorRepository::class)
 */
class MediaContributor
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
    private $role;

    /**
     * @ORM\ManyToOne(targetEntity=Contributor::class, inversedBy="mediaContributors")
     */
    private $hasForContributor;

    /**
     * @ORM\ManyToOne(targetEntity=Media::class, inversedBy="mediaContributors")
     */
    private $hasForMedia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getHasForContributor(): ?Contributor
    {
        return $this->hasForContributor;
    }

    public function setHasForContributor(?Contributor $hasForContributor): self
    {
        $this->hasForContributor = $hasForContributor;

        return $this;
    }

    public function getHasForMedia(): ?Media
    {
        return $this->hasForMedia;
    }

    public function setHasForMedia(?Media $hasForMedia): self
    {
        $this->hasForMedia = $hasForMedia;

        return $this;
    }
}
