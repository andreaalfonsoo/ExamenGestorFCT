<?php

namespace GestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestorBundle\Entity\Alumno;

class AlumnoController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('GestorBundle:Alumno');
        // find *all* alumnos
        $alumnos = $repository->findAll();
        return $this->render('GestorBundle:Alumno:all.html.twig',array("alumnos"=>$alumnos));
    }

}
