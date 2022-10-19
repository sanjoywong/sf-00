<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'formations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?self $categorie2 = null;

    #[ORM\OneToMany(mappedBy: 'categorie2', targetEntity: self::class)]
    private Collection $formations;

    #[ORM\ManyToOne(inversedBy: 'formations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie2 $catgorie2 = null;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategorie2(): ?self
    {
        return $this->categorie2;
    }

    public function setCategorie2(?self $categorie2): self
    {
        $this->categorie2 = $categorie2;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(self $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations->add($formation);
            $formation->setCategorie2($this);
        }

        return $this;
    }

    public function removeFormation(self $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getCategorie2() === $this) {
                $formation->setCategorie2(null);
            }
        }

        return $this;
    }

    public function getCatgorie2(): ?Categorie2
    {
        return $this->catgorie2;
    }

    public function setCatgorie2(?Categorie2 $catgorie2): self
    {
        $this->catgorie2 = $catgorie2;

        return $this;
    }
}
