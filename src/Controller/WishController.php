<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends abstractController{

	/**
	 * @Route("/wish", name="wish")
	 */
	public function index(){
		return $this->render('wish/wishList.html.twig');
	}
}