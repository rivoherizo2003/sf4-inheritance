<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */
class Customer extends Person
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $preferredBook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $criticAuthor;

    public function getId(): ?int
    {
        return $this->id;
    }

	/**
	 * @return mixed
	 */
	public function getPreferredBook()
	{
		return $this->preferredBook;
	}

	/**
	 * @param mixed $preferredBook
	 */
	public function setPreferredBook($preferredBook): void
	{
		$this->preferredBook = $preferredBook;
	}

    public function getCriticAuthor(): ?string
    {
        return $this->criticAuthor;
    }

    public function setCriticAuthor(?string $criticAuthor): self
    {
        $this->criticAuthor = $criticAuthor;

        return $this;
    }
}
