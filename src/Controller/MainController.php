<?php


namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Request;
use  App\Entity\Book;

class MainController extends AbstractController {

	/**
	 * @Route("/", name="main")
	 */
	public function index(BookRepository $bookRepository, Request $request) {
		/* return $this->render( 'main/index.html.twig' ); */


		//Tous les livres
		$books = $bookRepository->findby([],array('createdAt'=>'DESC'));

        return $this->render('main/index.html.twig',[
	        'books' => $books]);
	}
}
