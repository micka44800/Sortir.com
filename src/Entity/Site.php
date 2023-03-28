<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteRepository::class)]
class Site
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'Site', targetEntity: User::class)]
    private Collection $rattacheA;

    #[ORM\OneToMany(mappedBy: 'site', targetEntity: Sortie::class)]
    private Collection $liste;

    public function __construct()
    {
        $this->rattacheA = new ArrayCollection();
        $this->liste = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getRattacheA(): Collection
    {
        return $this->rattacheA;
    }

    public function addRattacheA(User $rattacheA): self
    {
        if (!$this->rattacheA->contains($rattacheA)) {
            $this->rattacheA->add($rattacheA);
            $rattacheA->setSite($this);
        }

        return $this;
    }

    public function removeRattacheA(User $rattacheA): self
    {
        if ($this->rattacheA->removeElement($rattacheA)) {
            // set the owning side to null (unless already changed)
            if ($rattacheA->getSite() === $this) {
                $rattacheA->setSite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sortie>
     */
    public function getListe(): Collection
    {
        return $this->liste;
    }

    public function addListe(Sortie $liste): self
    {
        if (!$this->liste->contains($liste)) {
            $this->liste->add($liste);
            $liste->setSite($this);
        }

        return $this;
    }

    public function removeListe(Sortie $liste): self
    {
        if ($this->liste->removeElement($liste)) {
            // set the owning side to null (unless already changed)
            if ($liste->getSite() === $this) {
                $liste->setSite(null);
            }
        }

        return $this;
    }
}
