<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Command", mappedBy="user")
     */
    private $commands;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Address", mappedBy="user")
     */
    private $billingAddress;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Address", mappedBy="user")
     */
    private $shippingAddress;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CreditCard", mappedBy="user")
     */
    private $creditCard;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cart", mappedBy="user")
     */
    private $carts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Wish", mappedBy="user")
     */
    private $wishes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentary", mappedBy="user")
     */
    private $commentaries;

    public function __construct()
    {
        $this->commands = new ArrayCollection();
        $this->billingAddress = new ArrayCollection();
        $this->shippingAddress = new ArrayCollection();
        $this->creditCard = new ArrayCollection();
        $this->carts = new ArrayCollection();
        $this->wishes = new ArrayCollection();
        $this->commentaries = new ArrayCollection();
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     */
    public function setRolesValue()
    {
        $this->roles[] = 'ROLE_USER';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
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

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Command[]
     */
    public function getCommands(): Collection
    {
        return $this->commands;
    }

    public function addCommand(Command $command): self
    {
        if (!$this->commands->contains($command)) {
            $this->commands[] = $command;
            $command->setUser($this);
        }

        return $this;
    }

    public function removeCommand(Command $command): self
    {
        if ($this->commands->contains($command)) {
            $this->commands->removeElement($command);
            // set the owning side to null (unless already changed)
            if ($command->getUser() === $this) {
                $command->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getBillingAddress(): Collection
    {
        return $this->billingAddress;
    }

    public function addBillingAddress(Address $billingAddress): self
    {
        if (!$this->billingAddress->contains($billingAddress)) {
            $this->billingAddress[] = $billingAddress;
            $billingAddress->setUser($this);
        }

        return $this;
    }

    public function removeBillingAddress(Address $billingAddress): self
    {
        if ($this->billingAddress->contains($billingAddress)) {
            $this->billingAddress->removeElement($billingAddress);
            // set the owning side to null (unless already changed)
            if ($billingAddress->getUser() === $this) {
                $billingAddress->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getShippingAddress(): Collection
    {
        return $this->shippingAddress;
    }

    public function addShippingAddress(Address $shippingAddress): self
    {
        if (!$this->shippingAddress->contains($shippingAddress)) {
            $this->shippingAddress[] = $shippingAddress;
            $shippingAddress->setUser($this);
        }

        return $this;
    }

    public function removeShippingAddress(Address $shippingAddress): self
    {
        if ($this->shippingAddress->contains($shippingAddress)) {
            $this->shippingAddress->removeElement($shippingAddress);
            // set the owning side to null (unless already changed)
            if ($shippingAddress->getUser() === $this) {
                $shippingAddress->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CreditCard[]
     */
    public function getCreditCard(): Collection
    {
        return $this->creditCard;
    }

    public function addCreditCard(CreditCard $creditCard): self
    {
        if (!$this->creditCard->contains($creditCard)) {
            $this->creditCard[] = $creditCard;
            $creditCard->setUser($this);
        }

        return $this;
    }

    public function removeCreditCard(CreditCard $creditCard): self
    {
        if ($this->creditCard->contains($creditCard)) {
            $this->creditCard->removeElement($creditCard);
            // set the owning side to null (unless already changed)
            if ($creditCard->getUser() === $this) {
                $creditCard->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cart[]
     */
    public function getCarts(): Collection
    {
        return $this->carts;
    }

    public function addCart(Cart $cart): self
    {
        if (!$this->carts->contains($cart)) {
            $this->carts[] = $cart;
            $cart->setUser($this);
        }

        return $this;
    }

    public function removeCart(Cart $cart): self
    {
        if ($this->carts->contains($cart)) {
            $this->carts->removeElement($cart);
            // set the owning side to null (unless already changed)
            if ($cart->getUser() === $this) {
                $cart->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Wish[]
     */
    public function getWishes(): Collection
    {
        return $this->wishes;
    }

    public function addWish(Wish $wish): self
    {
        if (!$this->wishes->contains($wish)) {
            $this->wishes[] = $wish;
            $wish->setUser($this);
        }

        return $this;
    }

    public function removeWish(Wish $wish): self
    {
        if ($this->wishes->contains($wish)) {
            $this->wishes->removeElement($wish);
            // set the owning side to null (unless already changed)
            if ($wish->getUser() === $this) {
                $wish->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentary[]
     */
    public function getCommentaries(): Collection
    {
        return $this->commentaries;
    }

    public function addCommentary(Commentary $commentary): self
    {
        if (!$this->commentaries->contains($commentary)) {
            $this->commentaries[] = $commentary;
            $commentary->setUser($this);
        }

        return $this;
    }

    public function removeCommentary(Commentary $commentary): self
    {
        if ($this->commentaries->contains($commentary)) {
            $this->commentaries->removeElement($commentary);
            // set the owning side to null (unless already changed)
            if ($commentary->getUser() === $this) {
                $commentary->setUser(null);
            }
        }

        return $this;
    }
}
