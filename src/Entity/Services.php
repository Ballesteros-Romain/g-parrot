<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'services', targetEntity: Users::class)]
    private Collection $parent;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: SousServices::class)]
    private Collection $sousServices;

    public function __construct()
    {
        $this->parent = new ArrayCollection();
        $this->sousServices = new ArrayCollection();
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getParent(): Collection
    {
        return $this->parent;
    }

    public function addParent(Users $parent): static
    {
        if (!$this->parent->contains($parent)) {
            $this->parent->add($parent);
            $parent->setServices($this);
        }

        return $this;
    }

    public function removeParent(Users $parent): static
    {
        if ($this->parent->removeElement($parent)) {
            // set the owning side to null (unless already changed)
            if ($parent->getServices() === $this) {
                $parent->setServices(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SousServices>
     */
    public function getSousServices(): Collection
    {
        return $this->sousServices;
    }

    public function addSousService(SousServices $sousService): static
    {
        if (!$this->sousServices->contains($sousService)) {
            $this->sousServices->add($sousService);
            $sousService->setParent($this);
        }

        return $this;
    }

    public function removeSousService(SousServices $sousService): static
    {
        if ($this->sousServices->removeElement($sousService)) {
            // set the owning side to null (unless already changed)
            if ($sousService->getParent() === $this) {
                $sousService->setParent(null);
            }
        }

        return $this;
    }
}
