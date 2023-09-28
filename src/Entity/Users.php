<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;


    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;


    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: Avis::class)]
    private Collection $avis;

    #[ORM\ManyToOne(inversedBy: 'parent')]
    private ?Services $services = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: Horaires::class)]
    private Collection $horaires;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: Roles::class)]
    private Collection $select_roles;

    public function __construct()
    {
        $this->avis = new ArrayCollection();
        $this->horaires = new ArrayCollection();
        $this->select_roles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }



    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): static
    {
        if (!$this->avis->contains($avi)) {
            $this->avis->add($avi);
            $avi->setParent($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): static
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getParent() === $this) {
                $avi->setParent(null);
            }
        }

        return $this;
    }

    public function getServices(): ?Services
    {
        return $this->services;
    }

    public function setServices(?Services $services): static
    {
        $this->services = $services;

        return $this;
    }

    /**
     * @return Collection<int, Horaires>
     */
    public function getHoraires(): Collection
    {
        return $this->horaires;
    }

    public function addHoraire(Horaires $horaire): static
    {
        if (!$this->horaires->contains($horaire)) {
            $this->horaires->add($horaire);
            $horaire->setParent($this);
        }

        return $this;
    }

    public function removeHoraire(Horaires $horaire): static
    {
        if ($this->horaires->removeElement($horaire)) {
            // set the owning side to null (unless already changed)
            if ($horaire->getParent() === $this) {
                $horaire->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Roles>
     */
    public function getSelectRoles(): Collection
    {
        return $this->select_roles;
    }

    public function addSelectRole(Roles $selectRole): static
    {
        if (!$this->select_roles->contains($selectRole)) {
            $this->select_roles->add($selectRole);
            $selectRole->setParent($this);
        }

        return $this;
    }

    public function removeSelectRole(Roles $selectRole): static
    {
        if ($this->select_roles->removeElement($selectRole)) {
            // set the owning side to null (unless already changed)
            if ($selectRole->getParent() === $this) {
                $selectRole->setParent(null);
            }
        }

        return $this;
    }
}