<?php

namespace App\Entity;

use App\InterfaceClass\BaseEntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"person"="Person","customer"="Customer", "author"="Author"})
 * @ORM\HasLifecycleCallbacks()
 */
class Person implements BaseEntityInterface
{
	use BaseEntity;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateOfBirth;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

	/**
	 * @ORM\PreUpdate()
	 */
	public function setUpdate()
	{
		$this->setLastUpdated(new \DateTime());
	}

	/**
	 * @ORM\PrePersist()
	 */
	public function setAddDate()
	{
		$this->setAddedDate(new \DateTime());
	}

	public function __toString()
	{
		return $this->getFirstName(). " " .$this->getLastName();
	}
}
