<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $heure_matin = null;

    #[ORM\Column(length: 255)]
    private ?string $heure_soir = null;

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    #[ORM\ManyToOne(inversedBy: 'horaires')]
    private ?Users $parent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getHeureMatin(): ?string
    {
        return $this->heure_matin;
    }

    public function setHeureMatin(string $heure_matin): static
    {
        $this->heure_matin = $heure_matin;

        return $this;
    }

    public function getHeureSoir(): ?string
    {
        return $this->heure_soir;
    }

    public function setHeureSoir(string $heure_soir): static
    {
        $this->heure_soir = $heure_soir;

        return $this;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getParent(): ?Users
    {
        return $this->parent;
    }

    public function setParent(?Users $parent): static
    {
        $this->parent = $parent;

        return $this;
    }
}
