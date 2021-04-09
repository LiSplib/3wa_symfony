<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee extends User
{
    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $office;

    /**
     * @ORM\OneToMany(targetEntity=Animation::class, mappedBy="organizedBy")
     */
    private $animations;

    public function __construct()
    {
        $this->animations = new ArrayCollection();
    }

    public function getOffice(): ?string
    {
        return $this->office;
    }

    public function setOffice(?string $office): self
    {
        $this->office = $office;

        return $this;
    }

    /**
     * @return Collection|Animation[]
     */
    public function getAnimations(): Collection
    {
        return $this->animations;
    }

    public function addAnimation(Animation $animation): self
    {
        if (!$this->animations->contains($animation)) {
            $this->animations[] = $animation;
            $animation->setOrganizedBy($this);
        }

        return $this;
    }

    public function removeAnimation(Animation $animation): self
    {
        if ($this->animations->removeElement($animation)) {
            // set the owning side to null (unless already changed)
            if ($animation->getOrganizedBy() === $this) {
                $animation->setOrganizedBy(null);
            }
        }

        return $this;
    }
}
