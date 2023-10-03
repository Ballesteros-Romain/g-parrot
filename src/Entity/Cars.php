<?php

namespace App\Entity;

use Vich\Uploadable;
use App\Entity\Images;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CarsRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Filesystem\Filesystem;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CarsRepository::class)]
#[Vich\Uploadable]
class Cars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column]
    private ?int $kilometre = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image;

    #[vich\UploadableField(mapping: 'image', fileNameProperty: 'image')]
    private ?file $file = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    // #[ORM\OneToMany(mappedBy: 'parent', targetEntity: Images::class)]
    // private Collection $images;
    // #[ORM\OneToMany(mappedBy: 'car', targetEntity: Images::class, orphanRemoval: true, cascade:['persist'])]
    // private Collection $images;

    public function __construct()
    {
        // $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getKilometre(): ?int
    {
        return $this->kilometre;
    }

    public function setKilometre(int $kilometre): static
    {
        $this->kilometre = $kilometre;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }
    // public function removeImage()
    // {
    //     $this->image = null;
    // }

    public function setFile(?file $file): self
    {
        $this->file = $file;
        if(null!== $file){
            $this->updatedAt = new \DateTimeImmutable();

        }
        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    








    // /**
    //  * @return Collection<int, Images>
    //  */
    // public function getImages(): Collection
    // {
    //     return $this->images;
    // }

    // public function addImage(Images $image): static
    // {
    //     if (!$this->images->contains($image)) {
    //         $this->images->add($image);
    //         $image->setParent($this);
    //     }

    //     return $this;
    // }

    // public function removeImage(Images $image): static
    // {
    //     if ($this->images->removeElement($image)) {
    //         // set the owning side to null (unless already changed)
    //         if ($image->getParent() === $this) {
    //             $image->setParent(null);
    //         }
    //     }

    //     return $this;
    // }
}