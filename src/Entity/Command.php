<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandRepository")
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
    private $totalPriceHt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $toatlPriceTTC;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $deliveryInstrucation;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="command", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Address", cascade={"persist", "remove"})
     */
    private $billingAddress;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Address", cascade={"persist", "remove"})
     */
    private $shippingAddress;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TransactionStatus", inversedBy="command", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $transactionStatus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommandLine", mappedBy="command")
     */
    private $commandLines;

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

    public function getTotalPriceHt(): ?float
    {
        return $this->totalPriceHt;
    }

    public function setTotalPriceHt(?float $totalPriceHt): self
    {
        $this->totalPriceHt = $totalPriceHt;

        return $this;
    }

    public function getToatlPriceTTC(): ?float
    {
        return $this->toatlPriceTTC;
    }

    public function setToatlPriceTTC(?float $toatlPriceTTC): self
    {
        $this->toatlPriceTTC = $toatlPriceTTC;

        return $this;
    }

    public function getDeliveryInstrucation(): ?string
    {
        return $this->deliveryInstrucation;
    }

    public function setDeliveryInstrucation(?string $deliveryInstrucation): self
    {
        $this->deliveryInstrucation = $deliveryInstrucation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(?Address $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    public function getTransactionStatus(): ?TransactionStatus
    {
        return $this->transactionStatus;
    }

    public function setTransactionStatus(TransactionStatus $transactionStatus): self
    {
        $this->transactionStatus = $transactionStatus;

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
}
