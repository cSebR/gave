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
	public function index(){
		return $this->render('product/product.html.twig');
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