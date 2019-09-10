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
 * Class BaseEntity
 * @package App\Entity
 */
trait BaseEntity
{

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $addedDate;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
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
}