<?php

namespace App\Controller;


use App\Repository\CartRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Entity\Cart;
use Symfony\Component\Security\Core\Security;

class CartController extends AbstractController {
	
	/**
	 * @Route("/cart", name="cart", methods={"GET"})
	 */
	public function index(CartRepository $cartRepository, Security $security): Response	
    {
        if (empty($security->getUser())) {
            return $this->render('cart/cart.html.twig', [
				'carts' => [],
			]);
		}
        return $this->render('cart/cart.html.twig', [
            'carts' => $cartRepository->findBy(['user' => $security->getUser()->getId()]),
        ]);
    }

	/**
	 * @Route("/checkout", name="checkout")
	 */
	public function check() {
		return $this->render( 'cart/checkOut.html.twig' );
	}

	/**
	 * @Route("/cart_add/{id}/number/{number}", name="cart_add")
	 */
	public function addItem(Book $book, int $number, Security $security) {
		$user = $security->getUser();
		
		if(empty($user)) {
			return $this->redirectToRoute('login');
		}
		
        $cart = new Cart();
        $cart = $cart->setUser($user);
        $cart = $cart->setNumber($number);
        $cart = $cart->setBook($book);

		$entityManager = $this->getDoctrine()->getManager();
		$entityManager->persist($cart);
		$entityManager->flush();

		return $this->redirectToRoute('cart');
	}
}
