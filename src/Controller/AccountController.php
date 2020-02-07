<?php


namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;


class AccountController extends AbstractController{

	/**
	 * @Route("/account", name="account")
	 */
	public function index(){


		//role = '';
		return $this->render( 'account/account.html.twig' );


	}

	/**
	 * @Route("/account/edit", name="edit_account")
	 */
	public function editAccount(){

		//role = '';
		return $this->render( 'account/editAccount.html.twig' );


	}

}