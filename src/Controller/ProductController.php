<?php


namespace App\Controller;

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
	public function index(Request $request, BookRepository $bookRepository){

		//Recuperation de l'id du livre
		$book_id = $request->get('id');
		//die(var_dump($book_id));

		//Recuperation des details du livre
		$bookDetails = $bookRepository->findBy(['id' => $book_id]);

		return $this->render('product/product.html.twig',array(
			'book' => $bookDetails
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

	/**
     * @Route("/new", name="book_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('book_index');
        }

        return $this->render('book/new.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }
}