<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CustomerController extends AbstractController {

	/**
	 * @Route("/list/customer", name="list_customer")
	 */
	public function index(){
		return $this->render('customer/listCustomer.html.twig');
	}

	/**
	 * @Route("/edit/customer", name="edit_customer")
	 */
	public function edit(){
		return $this->render('customer/editCustomer.html.twig');
	}

}