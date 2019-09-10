<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/6/19
 * Time: 9:54 AM
 */

namespace App\Controller;


use App\Entity\Customer;
use App\Form\CustomerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/customer")
 * Class CustomerController
 * @package App\Controller
 */
class CustomerController extends BaseController
{
	/**
	 * @Route("/add/new", name="app_customer_register")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \Exception
	 */
	public function register(Request $request)
	{
		$customer = new Customer();
		$formCustomer = $this->createForm(CustomerType::class, $customer);
		$formCustomer->handleRequest($request);
		if ($formCustomer->isSubmitted() && $formCustomer->isValid()) {
			$formCustomerData = $formCustomer->getData();
			$this->myPersist($formCustomerData);

			return $this->redirect($request->getUri());
		}
		$acCustomer = $this->registry->getRepository(Customer::class)->findBy([],['id' => 'DESC'],10);

		return $this->render('customer/formAdd.html.twig', [
			'formCustomer' => $formCustomer->createView(),
			'acCustomer' => $acCustomer,
		]);
	}
}