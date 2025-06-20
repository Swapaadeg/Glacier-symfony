<?php

namespace App\Entity;

use App\Repository\ConesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConesRepository::class)]
class Cones
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * @var Collection<int, Glaces>
     */
    #[ORM\OneToMany(targetEntity: Glaces::class, mappedBy: 'cones')]
    private Collection $glace;

    public function __construct()
    {
        $this->glace = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Glaces>
     */
    public function getGlace(): Collection
    {
        return $this->glace;
    }

    public function addGlace(Glaces $glace): static
    {
        if (!$this->glace->contains($glace)) {
            $this->glace->add($glace);
            $glace->setCones($this);
        }

        return $this;
    }

    public function removeGlace(Glaces $glace): static
    {
        if ($this->glace->removeElement($glace)) {
            // set the owning side to null (unless already changed)
            if ($glace->getCones() === $this) {
                $glace->setCones(null);
            }
        }

        return $this;
    }
}
