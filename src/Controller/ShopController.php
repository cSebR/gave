<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;

class ShopController extends AbstractController {

	/**
	 * @Route("/shop", name="shop")
	 */
/* 	public function index(){

		return $this->render('shop/shop.html.twig');
	} */

/* 	public function getBooksByCategory(BookRepository $BookRepository, $category)
    {
        return $this->$BookRepository->findBy(['category' => $category]);
	} */
	
	public function getBooksByCategory(BookRepository $bookRepository){

		return $this->render('shop/shop.html.twig',['books' => $bookRepository->findBy(['category' => 2])]);
	}
}