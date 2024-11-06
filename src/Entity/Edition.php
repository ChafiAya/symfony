<?php

namespace App\Entity;

use App\Repository\EditionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EditionRepository::class)]
class Edition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_edition = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Livre>
     */
    #[ORM\OneToMany(targetEntity: Livre::class, mappedBy: 'id_edition')]
    private Collection $id_livre;

    public function __construct()
    {
        $this->id_livre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getIdEdition(): ?int
    {
        return $this->id_edition;
    }

    public function setIdEdition(int $id_edition): static
    {
        $this->id_edition = $id_edition;

        return $this;
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

    /**
     * @return Collection<int, Livre>
     */
    public function getIdLivre(): Collection
    {
        return $this->id_livre;
    }

    public function addIdLivre(Livre $idLivre): static
    {
        if (!$this->id_livre->contains($idLivre)) {
            $this->id_livre->add($idLivre);
            $idLivre->setIdEdition($this);
        }

        return $this;
    }

    public function removeIdLivre(Livre $idLivre): static
    {
        if ($this->id_livre->removeElement($idLivre)) {
            // set the owning side to null (unless already changed)
            if ($idLivre->getIdEdition() === $this) {
                $idLivre->setIdEdition(null);
            }
        }

        return $this;
    }
}
