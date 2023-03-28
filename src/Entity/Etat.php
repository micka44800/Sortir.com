<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatRepository::class)]
class Etat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'situation', targetEntity: Sortie::class)]
    private Collection $etat;

    public function __construct()
    {
        $this->etat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Sortie>
     */
    public function getEtat(): Collection
    {
        return $this->etat;
    }

    public function addEtat(Sortie $etat): self
    {
        if (!$this->etat->contains($etat)) {
            $this->etat->add($etat);
            $etat->setSituation($this);
        }

        return $this;
    }

    public function removeEtat(Sortie $etat): self
    {
        if ($this->etat->removeElement($etat)) {
            // set the owning side to null (unless already changed)
            if ($etat->getSituation() === $this) {
                $etat->setSituation(null);
            }
        }

        return $this;
    }
}
