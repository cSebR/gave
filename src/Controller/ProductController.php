<?php


namespace App\Controller;

use http\Env\Request;
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

}