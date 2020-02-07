<?php


namespace App\Controller;

use App\Entity\Cart;
use App\Form\CartType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\ShopController;

class ProductController extends AbstractController{

	/**
	 * @Route("/shop/product", name="product")
	 */
	public function index(Request $request, BookRepository $bookRepository): Response {

		/**
		 * Section get current book
		 */
		//Recuperation de l'id du livre
		$book_id = $request->get('id');

		//Recuperation des details du livre
		$bookDetails = $bookRepository->findBy(['id' => $book_id]);

		/**
		 * Section add current book to cart
		 */
        $cart = new Cart();
        $form = $this->createForm(CartType::class, $cart);
		$form->handleRequest($request);
		
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cart);
            $entityManager->flush();

            return $this->redirectToRoute('cart');
        }

		return $this->render('product/product.html.twig',array(
			'book' => $bookDetails,
			'cart' => $cart,
            'form' => $form->createView(),
		));
	}

	/**
	 * @Route("/shop/list/product", name="list_product")
	 */
	public function listProduct() {
		return $this->render( 'product/listProduct.html.twig' );
	}

	/**
	 * @Route("/edit/product", name="edit_product")
	 */
	public function editProduct(){
		return $this->render('product/editProduct.html.twig');
	}


}