<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Command
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $orderDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $shipDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPaid;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $payementDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $discountType;

    /**
     * @ORM\Column(type="float")
     */
    private $discountAmout;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalPriceHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalPriceTTC;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $deliveryInstruction;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommandLine", mappedBy="command")
     */
    private $commandLines;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commands")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $billingAddressLigne1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $billingAddressLigne2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $billingAddressLigne3;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $billingAddressPostalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $billingAddressCity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shippingAddressLigne1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shippingAddressLigne2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shippingAddressLigne3;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $shippingAddressPostalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shippingAddressCity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TransactionStatus", inversedBy="commands")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transactionStatus;
 
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    public function __construct()
    {
        $this->commandLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(?\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getShipDate(): ?\DateTimeInterface
    {
        return $this->shipDate;
    }

    public function setShipDate(?\DateTimeInterface $shipDate): self
    {
        $this->shipDate = $shipDate;

        return $this;
    }

    public function getIsPaid(): ?bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(bool $isPaid): self
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    public function getPayementDate(): ?\DateTimeInterface
    {
        return $this->payementDate;
    }

    public function setPayementDate(?\DateTimeInterface $payementDate): self
    {
        $this->payementDate = $payementDate;

        return $this;
    }

    public function getDiscountType(): ?string
    {
        return $this->discountType;
    }

    public function setDiscountType(?string $discountType): self
    {
        $this->discountType = $discountType;

        return $this;
    }

    public function getDiscountAmout(): ?float
    {
        return $this->discountAmout;
    }

    public function setDiscountAmout(float $discountAmout): self
    {
        $this->discountAmout = $discountAmout;

        return $this;
    }

    public function getTotalPriceHT(): ?float
    {
        return $this->totalPriceHT;
    }

    public function setTotalPriceHT(?float $totalPriceHT): self
    {
        $this->totalPriceHT = $totalPriceHT;

        return $this;
    }

    public function getTotalPriceTTC(): ?float
    {
        return $this->totalPriceTTC;
    }

    public function setTotalPriceTTC(?float $totalPriceTTC): self
    {
        $this->totalPriceTTC = $totalPriceTTC;

        return $this;
    }

    public function getDeliveryInstruction(): ?string
    {
        return $this->deliveryInstruction;
    }

    public function setDeliveryInstruction(?string $deliveryInstruction): self
    {
        $this->deliveryInstruction = $deliveryInstruction;

        return $this;
    }

    /**
     * @return Collection|CommandLine[]
     */
    public function getCommandLines(): Collection
    {
        return $this->commandLines;
    }

    public function addCommandLine(CommandLine $commandLine): self
    {
        if (!$this->commandLines->contains($commandLine)) {
            $this->commandLines[] = $commandLine;
            $commandLine->setCommand($this);
        }

        return $this;
    }

    public function removeCommandLine(CommandLine $commandLine): self
    {
        if ($this->commandLines->contains($commandLine)) {
            $this->commandLines->removeElement($commandLine);
            // set the owning side to null (unless already changed)
            if ($commandLine->getCommand() === $this) {
                $commandLine->setCommand(null);
            }
        }

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBillingAddressLigne1(): ?string
    {
        return $this->billingAddressLigne1;
    }

    public function setBillingAddressLigne1(string $billingAddressLigne1): self
    {
        $this->billingAddressLigne1 = $billingAddressLigne1;

        return $this;
    }

    public function getBillingAddressLigne2(): ?string
    {
        return $this->billingAddressLigne2;
    }

    public function setBillingAddressLigne2(?string $billingAddressLigne2): self
    {
        $this->billingAddressLigne2 = $billingAddressLigne2;

        return $this;
    }

    public function getBillingAddressLigne3(): ?string
    {
        return $this->billingAddressLigne3;
    }

    public function setBillingAddressLigne3(?string $billingAddressLigne3): self
    {
        $this->billingAddressLigne3 = $billingAddressLigne3;

        return $this;
    }

    public function getBillingAddressPostalCode(): ?string
    {
        return $this->billingAddressPostalCode;
    }

    public function setBillingAddressPostalCode(string $billingAddressPostalCode): self
    {
        $this->billingAddressPostalCode = $billingAddressPostalCode;

        return $this;
    }

    public function getBillingAddressCity(): ?string
    {
        return $this->billingAddressCity;
    }

    public function setBillingAddressCity(string $billingAddressCity): self
    {
        $this->billingAddressCity = $billingAddressCity;

        return $this;
    }

    public function getShippingAddressLigne1(): ?string
    {
        return $this->shippingAddressLigne1;
    }

    public function setShippingAddressLigne1(string $shippingAddressLigne1): self
    {
        $this->shippingAddressLigne1 = $shippingAddressLigne1;

        return $this;
    }

    public function getShippingAddressLigne2(): ?string
    {
        return $this->shippingAddressLigne2;
    }

    public function setShippingAddressLigne2(?string $shippingAddressLigne2): self
    {
        $this->shippingAddressLigne2 = $shippingAddressLigne2;

        return $this;
    }

    public function getShippingAddressLigne3(): ?string
    {
        return $this->shippingAddressLigne3;
    }

    public function setShippingAddressLigne3(?string $shippingAddressLigne3): self
    {
        $this->shippingAddressLigne3 = $shippingAddressLigne3;

        return $this;
    }

    public function getShippingAddressPostalCode(): ?string
    {
        return $this->shippingAddressPostalCode;
    }

    public function setShippingAddressPostalCode(string $shippingAddressPostalCode): self
    {
        $this->shippingAddressPostalCode = $shippingAddressPostalCode;

        return $this;
    }

    public function getShippingAddressCity(): ?string
    {
        return $this->shippingAddressCity;
    }

    public function setShippingAddressCity(string $shippingAddressCity): self
    {
        $this->shippingAddressCity = $shippingAddressCity;

        return $this;
    }

    public function getTransactionStatus(): ?TransactionStatus
    {
        return $this->transactionStatus;
    }

    public function setTransactionStatus(?TransactionStatus $transactionStatus): self
    {
        $this->transactionStatus = $transactionStatus;

        return $this;
    }
}
