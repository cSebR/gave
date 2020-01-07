<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandController extends AbstractController{

	/**
	 * @Route("/resume/command", name="resume_command")
	 */
	public function index(){

		return $this->render('command/resumeCommand.html.twig');
	}


}