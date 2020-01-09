<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class ContactController extends AbstractController{

	/**
	 * @Route("/contact", name="form_contact")
	 */
	public function index(){

		return $this->render('contact/contact.html.twig');
	}

}