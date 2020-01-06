<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
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
    private $cover;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $backCover;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishedDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfCopies;

    /**
     * @ORM\Column(type="float")
     */
    private $priceHT;

    /**
     * @ORM\Column(type="float")
     */
    private $priceTTC;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $discountAmount;

    /**
     * @ORM\Column(type="string", length=23, nullable=true)
     */
    private $discountType;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numberOfPages;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ranking;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ISBN10;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ISBN13;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ASIN;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dimention;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAvailable;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Author", inversedBy="books")
     */
    private $authorId;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Format", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $format;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Publisher", inversedBy="book", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $publisher;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme", inversedBy="books")
     */
    private $theme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="book")
     */
    private $category;

    public function __construct()
    {
        $this->authorId = new ArrayCollection();
        $this->theme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getBackCover(): ?string
    {
        return $this->backCover;
    }

    public function setBackCover(?string $backCover): self
    {
        $this->backCover = $backCover;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPublishedDate(): ?\DateTimeInterface
    {
        return $this->publishedDate;
    }

    public function setPublishedDate(\DateTimeInterface $publishedDate): self
    {
        $this->publishedDate = $publishedDate;

        return $this;
    }

    public function getNumberOfCopies(): ?int
    {
        return $this->numberOfCopies;
    }

    public function setNumberOfCopies(int $numberOfCopies): self
    {
        $this->numberOfCopies = $numberOfCopies;

        return $this;
    }

    public function getPriceHT(): ?float
    {
        return $this->priceHT;
    }

    public function setPriceHT(float $priceHT): self
    {
        $this->priceHT = $priceHT;

        return $this;
    }

    public function getPriceTTC(): ?float
    {
        return $this->priceTTC;
    }

    public function setPriceTTC(float $priceTTC): self
    {
        $this->priceTTC = $priceTTC;

        return $this;
    }

    public function getDiscountAmount(): ?float
    {
        return $this->discountAmount;
    }

    public function setDiscountAmount(?float $discountAmount): self
    {
        $this->discountAmount = $discountAmount;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNumberOfPages(): ?int
    {
        return $this->numberOfPages;
    }

    public function setNumberOfPages(int $numberOfPages): self
    {
        $this->numberOfPages = $numberOfPages;

        return $this;
    }

    public function getRanking(): ?float
    {
        return $this->ranking;
    }

    public function setRanking(?float $ranking): self
    {
        $this->ranking = $ranking;

        return $this;
    }

    public function getISBN10(): ?string
    {
        return $this->ISBN10;
    }

    public function setISBN10(string $ISBN10): self
    {
        $this->ISBN10 = $ISBN10;

        return $this;
    }

    public function getISBN13(): ?string
    {
        return $this->ISBN13;
    }

    public function setISBN13(string $ISBN13): self
    {
        $this->ISBN13 = $ISBN13;

        return $this;
    }

    public function getASIN(): ?string
    {
        return $this->ASIN;
    }

    public function setASIN(string $ASIN): self
    {
        $this->ASIN = $ASIN;

        return $this;
    }

    public function getDimention(): ?string
    {
        return $this->dimention;
    }

    public function setDimention(?string $dimention): self
    {
        $this->dimention = $dimention;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    /**
     * @return Collection|Author[]
     */
    public function getAuthorId(): Collection
    {
        return $this->authorId;
    }

    public function addAuthorId(Author $authorId): self
    {
        if (!$this->authorId->contains($authorId)) {
            $this->authorId[] = $authorId;
        }

        return $this;
    }

    public function removeAuthorId(Author $authorId): self
    {
        if ($this->authorId->contains($authorId)) {
            $this->authorId->removeElement($authorId);
        }

        return $this;
    }

    public function getFormat(): ?Format
    {
        return $this->format;
    }

    public function setFormat(Format $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getPublisher(): ?Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(Publisher $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * @return Collection|Theme[]
     */
    public function getTheme(): Collection
    {
        return $this->theme;
    }

    public function addTheme(Theme $theme): self
    {
        if (!$this->theme->contains($theme)) {
            $this->theme[] = $theme;
        }

        return $this;
    }

    public function removeTheme(Theme $theme): self
    {
        if ($this->theme->contains($theme)) {
            $this->theme->removeElement($theme);
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
