<?php

namespace App\Entity;

use App\Repository\ToppingsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ToppingsRepository::class)]
class Toppings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $topping = null;

    /**
     * @var Collection<int, Glaces>
     */
    #[ORM\ManyToMany(targetEntity: Glaces::class, mappedBy: 'topping')]
    private Collection $glaces;

    public function __construct()
    {
        $this->glaces = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTopping(): ?string
    {
        return $this->topping;
    }

    public function setTopping(string $topping): static
    {
        $this->topping = $topping;

        return $this;
    }

    /**
     * @return Collection<int, Glaces>
     */
    public function getGlaces(): Collection
    {
        return $this->glaces;
    }

    public function addGlace(Glaces $glace): static
    {
        if (!$this->glaces->contains($glace)) {
            $this->glaces->add($glace);
            $glace->addTopping($this);
        }

        return $this;
    }

    public function removeGlace(Glaces $glace): static
    {
        if ($this->glaces->removeElement($glace)) {
            $glace->removeTopping($this);
        }

        return $this;
    }
}
