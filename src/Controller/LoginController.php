<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController {

	/**
	 * @Route("/login", name="login")
	 */
	public function index(){

		return $this->render('login/login.html.twig');
	}

	/**
	 * @Route("/register", name="register")
	 */
	public function register(){

		return $this->render('login/register.html.twig');
	}

}