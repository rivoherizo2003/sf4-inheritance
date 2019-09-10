<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/6/19
 * Time: 9:54 AM
 */

namespace App\Controller;


use App\Entity\Customer;
use App\Entity\Person;
use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/customer")
 * Class CustomerController
 * @package App\Controller
 */
class CustomerController extends AbstractController
{
	/**
	 * @Route("/add/new")
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function register()
	{
		$person = new Person();
		$customer = new Customer();
		$formCustomer = $this->createForm(CustomerType::class, $customer);
		if ($formCustomer->isSubmitted() && $formCustomer->isValid()) {
			$formCustomerData = $formCustomer->getData();
		}

		return $this->render('user/formAdd.html.twig', [
			'formCustomer' => $formCustomer->createView()
		]);
	}
}