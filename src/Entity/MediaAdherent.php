<?php

namespace App\Entity;

use App\Repository\MediaAdherentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaAdherentRepository::class)
 */
class MediaAdherent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $borrowingDate;

    /**
     * @ORM\Column(type="date")
     */
    private $estimatedReturnDate;

    /**
     * @ORM\Column(type="date")
     */
    private $effectiveReturnDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reservation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowingDate(): ?\DateTimeInterface
    {
        return $this->borrowingDate;
    }

    public function setBorrowingDate(\DateTimeInterface $borrowingDate): self
    {
        $this->borrowingDate = $borrowingDate;

        return $this;
    }

    public function getEstimatedReturnDate(): ?\DateTimeInterface
    {
        return $this->estimatedReturnDate;
    }

    public function setEstimatedReturnDate(\DateTimeInterface $estimatedReturnDate): self
    {
        $this->estimatedReturnDate = $estimatedReturnDate;

        return $this;
    }

    public function getEffectiveReturnDate(): ?\DateTimeInterface
    {
        return $this->effectiveReturnDate;
    }

    public function setEffectiveReturnDate(\DateTimeInterface $effectiveReturnDate): self
    {
        $this->effectiveReturnDate = $effectiveReturnDate;

        return $this;
    }

    public function getReservation(): ?bool
    {
        return $this->reservation;
    }

    public function setReservation(bool $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }
}
