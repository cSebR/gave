<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;

class CartController extends AbstractController {

	/**
	 * @Route("/cart", name="cart")
	 */
	public function index() {
		return $this->render( 'cart/cart.html.twig' );
	}

	/**
	 * @Route("/checkout", name="checkout")
	 */
	public function check() {
		return $this->render( 'cart/checkOut.html.twig' );
	}

	
	/**
	 * @Route("/cart_add/{id}", name="cart_add")
	 */
	public function addItem(Book $book) {
		// dd($book);
		$entityManager = $this->getDoctrine()->getManager();
		// $entityManager->persist($book);
		// $entityManager->flush();

		// dump($book);
		dd($entityManager);

		// return $this->redirectToRoute('cart');
		
		// return $this->render( 'cart/cart.html.twig' );
	}
}

// $book = new Book();
// $form = $this->createForm(BookType::class, $book);
// $form->handleRequest($request);

// if ($form->isSubmitted() && $form->isValid()) {
// 	$entityManager = $this->getDoctrine()->getManager();
// 	$entityManager->persist($book);
// 	$entityManager->flush();

// 	return $this->redirectToRoute('book_index');
// }

// return $this->render('book/new.html.twig', [
// 	'book' => $book,
// 	'form' => $form->createView(),
// ]);