<?php

namespace App\Entity;

use App\Repository\GlacesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

#[Vich\Uploadable]
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

    //UPLOAD DES IMAGES
    #[Vich\UploadableField(mapping: 'images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    /**
     * @var Collection<int, Toppings>
     */
    #[ORM\ManyToMany(targetEntity: Toppings::class, inversedBy: 'glaces')]
    private Collection $topping;

    public function __construct()
    {
        $this->topping = new ArrayCollection();
    }


    //setter & getter
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

    //Images
    public function setImageFile(?File $imageFile = null): void {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File {

    return $this->imageFile;
    }

    public function setImageName(?string $imageName): void {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string {
       return $this->imageName;
    }

    /**
     * @return Collection<int, Toppings>
     */
    public function getTopping(): Collection
    {
        return $this->topping;
    }

    public function addTopping(Toppings $topping): static
    {
        if (!$this->topping->contains($topping)) {
            $this->topping->add($topping);
        }

        return $this;
    }

    public function removeTopping(Toppings $topping): static
    {
        $this->topping->removeElement($topping);

        return $this;
    }
}


