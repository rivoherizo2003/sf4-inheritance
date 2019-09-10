<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/10/19
 * Time: 11:49 AM
 */

namespace App\Controller;


use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class BaseController extends AbstractController
{
	protected $registry;
	protected $translator;
	protected $session;

	public function __construct(RegistryInterface $registry, TranslatorInterface $translator, SessionInterface $session)
	{
		$this->registry = $registry;
		$this->translator = $translator;
		$this->session = $session;
	}

	/**
	 * @param $object
	 * @return mixed
	 * @throws \Exception
	 */
	protected function myPersist($object)
	{
		try{
			$this->registry->getManager()->persist($object);
			$this->registry->getManager()->flush();
		} catch (\Exception $e){
			throw new \Exception($e->getMessage(). " " . $e->getFile() . " " . $e->getLine());
		}
	}

	/**
	 * @throws \Exception
	 */
	protected function myFlush()
	{
		try{
			$this->registry->getManager()->flush();
		} catch (\Exception $e){
			throw new \Exception('Error during flush: '.$e->getMessage(). " " . $e->getFile() . " " . $e->getLine());
		}
	}
}