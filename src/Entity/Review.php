<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
 * @ORM\Entity
 */
class Review
{
	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @var int
	 * @ORM\Column(type="smallint")
	 */
	private $rating;

	/**
	 * @var string
	 * @ORM\Column(type="text")
	 */
	private $body;

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
	 * @var Book
	 * @ORM\ManyToOne(targetEntity="Book", inversedBy="reviews")
	 */
	private $book;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function setRating(int $rating)
	{
		$this->rating = $rating;
	}

	public function getRating(): int
	{
		return $this->rating;
	}

	public function setBody(string $body)
	{
		$this->body = $body;
	}

	public function getBody()
	{
		return $this->body;
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

	public function setBook(Book $book)
	{
		if (is_null($book) && !is_null($this->book)) {
			$this->book->getReviews()->removeElement($this);
			$this->book = null;
			return;
		}

		if (!is_null($this->book)) {
			$this->book->getReviews()->removeElement($this);
		}

		$book->getReviews()->add($this);
		$this->book = $book;
	}

	public function getBook(): Book
	{
		return $this->book;
	}
}
