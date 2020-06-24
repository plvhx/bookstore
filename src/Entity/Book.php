<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
 * @ORM\Entity
 */
class Book
{
	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @var string|null
	 * @ORM\Column(nullable=true)
	 */
	private $isbn;

	/**
	 * @var string
	 * @ORM\Column
	 */
	private $title;

	/**
	 * @var string
	 * @ORM\Column(type="text")
	 */
	private $description;

	/**
	 * @var string
	 * @ORM\Column
	 */
	private $author;

	/**
	 * @var \DateTimeInterface
	 * @ORM\Column(type="datetime")
	 */
	private $publicationDate;

	/**
	 * @var Review[]
	 * @ORM\OneToMany(targetEntity="Review", mappedBy="book", cascade={"persist", "remove"})
	 */
	private $reviews;

	public function __construct()
	{
		$this->reviews = new ArrayCollection();
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function setIsbn(?string $isbn)
	{
		$this->isbn = $isbn;
	}

	public function getIsbn(): ?string
	{
		return $this->isbn;
	}

	public function setTitle(string $title)
	{
		$this->title = $title;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function setDescription(string $description)
	{
		$this->description = $description;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function setAuthor(string $author)
	{
		$this->author = $author;
	}

	public function getAuthor(): string
	{
		return $this->author;
	}

	public function setPublicationDate(\DateTimeInterface $publicationDate)
	{
		$this->publicationDate = $publicationDate;
	}

	public function getPublicationDate(): \DateTimeInterface
	{
		return $this->publicationDate;
	}

	public function getReviews(): Collection
	{
		return $this->reviews;
	}
}
