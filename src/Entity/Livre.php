<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_livre = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Collect $id_collection = null;

    #[ORM\ManyToOne(inversedBy: 'id_livre')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Edition $id_edition = null;

    #[ORM\Column(length: 255)]
    private ?string $isbn = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getIdLivre(): ?int
    {
        return $this->id_livre;
    }

    public function setIdLivre(int $id_livre): static
    {
        $this->id_livre = $id_livre;

        return $this;
    }

    public function getIdCollection(): ?Collect
    {
        return $this->id_collection;
    }

    public function setIdCollection(?Collect $id_collection): static
    {
        $this->id_collection = $id_collection;

        return $this;
    }

    public function getIdEdition(): ?Edition
    {
        return $this->id_edition;
    }

    public function setIdEdition(?Edition $id_edition): static
    {
        $this->id_edition = $id_edition;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): static
    {
        $this->isbn = $isbn;

        return $this;
    }
}
