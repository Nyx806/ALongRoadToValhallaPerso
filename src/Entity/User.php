<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
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

    #[ORM\OneToMany(mappedBy: 'userLink', targetEntity: actualite::class, orphanRemoval: true)]
    private Collection $actualite;

    #[ORM\OneToMany(mappedBy: 'artworks', targetEntity: artwork::class)]
    private Collection $artwork;

    public function __construct()
    {
        $this->actualite = new ArrayCollection();
        $this->artwork = new ArrayCollection();
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
        return $this->password ?? '';   
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
     * @return Collection<int, actualite>
     */
    public function getActualite(): Collection
    {
        return $this->actualite;
    }

    public function addActualite(actualite $actualite): static
    {
        if (!$this->actualite->contains($actualite)) {
            $this->actualite->add($actualite);
            $actualite->setUserLink($this);
        }

        return $this;
    }

    public function removeActualite(actualite $actualite): static
    {
        if ($this->actualite->removeElement($actualite)) {
            // set the owning side to null (unless already changed)
            if ($actualite->getUserLink() === $this) {
                $actualite->setUserLink(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, artwork>
     */
    public function getArtwork(): Collection
    {
        return $this->artwork;
    }

    public function addArtwork(artwork $artwork): static
    {
        if (!$this->artwork->contains($artwork)) {
            $this->artwork->add($artwork);
            $artwork->setArtworks($this);
        }

        return $this;
    }

    public function removeArtwork(artwork $artwork): static
    {
        if ($this->artwork->removeElement($artwork)) {
            // set the owning side to null (unless already changed)
            if ($artwork->getArtworks() === $this) {
                $artwork->setArtworks(null);
            }
        }

        return $this;
    }
}
