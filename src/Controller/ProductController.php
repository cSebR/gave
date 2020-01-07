<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


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
	public function listProduct(){
		return $this->render('product/listProduct.html.twig');
	}

}