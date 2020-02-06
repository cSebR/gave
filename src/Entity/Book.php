<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
// use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Collection as DoctrineCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 * @ORM\HasLifecycleCallbacks()
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
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="book")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentary", mappedBy="book")
     */
    private $commentaries;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Format", inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $format;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Publisher", inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $publisher;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Collection", inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $collection;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etat", inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language", inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $language;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", cascade={"persist"}, mappedBy="book")
     */
    private $tags;
 
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    public function __construct()
    {
        $this->author = new ArrayCollection();
        $this->theme = new ArrayCollection();
        $this->commentaries = new ArrayCollection();
        $this->tags = new ArrayCollection();
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
     * @return DoctrineCollection|Author[]
     */
    public function getAuthor(): DoctrineCollection
    {
        return $this->author;
    }

    public function addAuthor(Author $author): self
    {
        if (!$this->author->contains($author)) {
            $this->author[] = $author;
        }

        return $this;
    }

    public function removeAuthor(Author $author): self
    {
        if ($this->author->contains($author)) {
            $this->author->removeElement($author);
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

    /**
     * @return DoctrineCollection|Commentary[]
     */
    public function getCommentaries(): DoctrineCollection
    {
        return $this->commentaries;
    }

    public function addCommentary(Commentary $commentary): self
    {
        if (!$this->commentaries->contains($commentary)) {
            $this->commentaries[] = $commentary;
            $commentary->setBook($this);
        }

        return $this;
    }

    public function removeCommentary(Commentary $commentary): self
    {
        if ($this->commentaries->contains($commentary)) {
            $this->commentaries->removeElement($commentary);
            // set the owning side to null (unless already changed)
            if ($commentary->getBook() === $this) {
                $commentary->setBook(null);
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

    public function getFormat(): ?Format
    {
        return $this->format;
    }

    public function setFormat(?Format $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getPublisher(): ?Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(?Publisher $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getCollection(): ?Collection
    {
        return $this->collection;
    }

    public function setCollection(?Collection $collection): self
    {
        $this->collection = $collection;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return DoctrineCollection|Tag[]
     */
    public function getTags(): DoctrineCollection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addBook($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeBook($this);
        }

        return $this;
    }
}
