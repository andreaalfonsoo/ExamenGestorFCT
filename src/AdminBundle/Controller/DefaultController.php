<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
    * @Route("/")
    */

    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }

    public function getAllAction()
    {
      $repository = $this->getDoctrine()->getRepository('gestorBundle:User');//Manejador de doctrine
      // find *all* users
      $users = $repository->findAll();
      return $this->render('AdminBundle:Default:index.html.twig', array("users"=>$users));
    }
}
