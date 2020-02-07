<?php


namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;


class DashboardController extends AbstractController{

	/**
	 * @Route("/dashboard", name="dashboard")
	 */
	public function index(){

		return $this->render( 'dashboard/dashboard.html.twig' );


	}

}