<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/6/19
 * Time: 9:54 AM
 */

namespace App\Controller;


use App\Entity\Author;
use App\Form\AuthorType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/author")
 * Class CustomerController
 * @package App\Controller
 */
class AuthorController extends BaseController
{
	/**
	 * @Route("/book/add/new", name="app_author_register")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 * @throws \Exception
	 */
	public function register(Request $request)
	{
		$author = new Author();
		$formAuthor = $this->createForm(AuthorType::class, $author);
		$formAuthor->handleRequest($request);
		if ($formAuthor->isSubmitted() && $formAuthor->isValid()) {
			$formAuthorData = $formAuthor->getData();
			$this->myPersist($formAuthorData);

			return $this->redirect($request->getUri());
		}
		$acAuthor = $this->registry->getRepository(Author::class)->findBy([],['id' => 'DESC'],10);

		return $this->render('author/formAdd.html.twig', [
			'formAuthor' => $formAuthor->createView(),
			'acAuthor' => $acAuthor,
		]);
	}
}