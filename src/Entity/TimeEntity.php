<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/2/19
 * Time: 9:18 AM
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Trait TimeEntity
 * @package App\Entity
 * @ORM\HasLifecycleCallbacks()
 */
trait TimeEntity
{
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $addedDate;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $lastUpdated;

	/**
	 * @return mixed
	 */
	public function getAddedDate()
	{
		return $this->addedDate;
	}

	/**
	 * @param mixed $addedDate
	 */
	public function setAddedDate($addedDate): void
	{
		$this->addedDate = $addedDate;
	}

	/**
	 * @return mixed
	 */
	public function getLastUpdated()
	{
		return $this->lastUpdated;
	}

	/**
	 * @param mixed $lastUpdated
	 */
	public function setLastUpdated($lastUpdated): void
	{
		$this->lastUpdated = $lastUpdated;
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
}