<?php

namespace App\Entity;

use App\Repository\GlacesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GlacesRepository::class)]
class Glaces
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $ingredient_special = null;

    #[ORM\ManyToOne(inversedBy: 'glace')]
    private ?Cones $cones = null;

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

    public function getIngredientSpecial(): ?string
    {
        return $this->ingredient_special;
    }

    public function setIngredientSpecial(string $ingredient_special): static
    {
        $this->ingredient_special = $ingredient_special;

        return $this;
    }

    public function getCones(): ?Cones
    {
        return $this->cones;
    }

    public function setCones(?Cones $cones): static
    {
        $this->cones = $cones;

        return $this;
    }
}
