<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $capacite = null;

    #[ORM\OneToMany(mappedBy: 'salle', targetEntity: Reservation::class)]
    private Collection $reservations;

    #[ORM\ManyToMany(targetEntity: Ergonomie::class, inversedBy: 'salles')]
    private Collection $ergonomie;

    #[ORM\ManyToMany(targetEntity: Logiciel::class, inversedBy: 'salles')]
    private Collection $logiciel;

    #[ORM\ManyToMany(targetEntity: Materiel::class, inversedBy: 'salles')]
    private Collection $materiel;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->ergonomie = new ArrayCollection();
        $this->logiciel = new ArrayCollection();
        $this->materiel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCapacite(): ?string
    {
        return $this->capacite;
    }

    public function setCapacite(string $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setSalle($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getSalle() === $this) {
                $reservation->setSalle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ergonomie>
     */
    public function getErgonomie(): Collection
    {
        return $this->ergonomie;
    }

    public function addErgonomie(Ergonomie $ergonomie): static
    {
        if (!$this->ergonomie->contains($ergonomie)) {
            $this->ergonomie->add($ergonomie);
        }

        return $this;
    }

    public function removeErgonomie(Ergonomie $ergonomie): static
    {
        $this->ergonomie->removeElement($ergonomie);

        return $this;
    }

    /**
     * @return Collection<int, Logiciel>
     */
    public function getLogiciel(): Collection
    {
        return $this->logiciel;
    }

    public function addLogiciel(Logiciel $logiciel): static
    {
        if (!$this->logiciel->contains($logiciel)) {
            $this->logiciel->add($logiciel);
        }

        return $this;
    }

    public function removeLogiciel(Logiciel $logiciel): static
    {
        $this->logiciel->removeElement($logiciel);

        return $this;
    }

    /**
     * @return Collection<int, Materiel>
     */
    public function getMateriel(): Collection
    {
        return $this->materiel;
    }

    public function addMateriel(Materiel $materiel): static
    {
        if (!$this->materiel->contains($materiel)) {
            $this->materiel->add($materiel);
        }

        return $this;
    }

    public function removeMateriel(Materiel $materiel): static
    {
        $this->materiel->removeElement($materiel);

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

}
