<?php


namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController {

	/**
	 * @Route("/", name="main")
	 */
	/*public function index(CategoryRepository $category_repository): Response
	{
	   return $this->render('main/index.html.twig',['categories' => $category_repository->findAll(),]);
	}*/
	public function index()
	{
		return $this->render('main/index.html.twig');
	}
}
