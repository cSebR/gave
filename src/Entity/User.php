<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Command", mappedBy="user", cascade={"persist", "remove"})
     */
    private $command;

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
    private $cart;

    public function __construct()
    {
        $this->billingAddress = new ArrayCollection();
        $this->shippingAddress = new ArrayCollection();
        $this->creditCard = new ArrayCollection();
        $this->cart = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCommand(): ?Command
    {
        return $this->command;
    }

    public function setCommand(Command $command): self
    {
        $this->command = $command;

        // set the owning side of the relation if necessary
        if ($command->getUser() !== $this) {
            $command->setUser($this);
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
    public function getCart(): Collection
    {
        return $this->cart;
    }

    public function addCart(Cart $cart): self
    {
        if (!$this->cart->contains($cart)) {
            $this->cart[] = $cart;
            $cart->setUser($this);
        }

        return $this;
    }

    public function removeCart(Cart $cart): self
    {
        if ($this->cart->contains($cart)) {
            $this->cart->removeElement($cart);
            // set the owning side to null (unless already changed)
            if ($cart->getUser() === $this) {
                $cart->setUser(null);
            }
        }

        return $this;
    }
}
