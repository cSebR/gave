<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;

class ShopController extends AbstractController {

	/**
	 * @Route("/shop", name="shop")
	 */
	public function index(CategoryRepository $categoryRepository,BookRepository $bookRepository, Request $request){

		//Tous les livres
		$books = $bookRepository->findAll();

        // Toutes les categories
        $categories = $categoryRepository->findAll();

        $categ_id = $request->get('id');

        // Categorie selectionnée
        $categorie = $bookRepository->findBy(['category' => $categ_id]);

        return $this->render('shop/shop.html.twig',[
            'categs' => $categories,
            'categ' => $categorie,
	        'books' => $books
        ]);
    }
}