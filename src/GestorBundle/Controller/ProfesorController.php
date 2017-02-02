<?php

namespace GestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestorBundle\Entity\Profesor;
use GestorBundle\Form\ProfesorType;
use Symfony\Component\HttpFoundation\Request;

class ProfesorController extends Controller
{
    public function allAction() /*Creamos un método donde mostraremos la lista de profesores que hay en la BBDD*/
    {
        $repository = $this->getDoctrine()->getRepository('GestorBundle:Profesor');
        // find *all* profesores
        $profesores = $repository->findAll();
        return $this->render('GestorBundle:Profesor:all.html.twig',array("profesor"=>$profesores));
    }

    public function crearProfesorAction(Request $request) /*Creamos un método para guardar los datos en la BBDD*/
    {
        $profesor = new Profesor();
        $form=$this->createForm(ProfesorType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated
           $profesor = $form->getData();

           // ... perform some action, such as saving the task to the database
           // for example, if Task is a Doctrine entity, save it!
           $em = $this->getDoctrine()->getManager();
           $em->persist($profesor);
           $em->flush();

           return $this->redirectToRoute('all_Profesor'); /*Una vez guardados los datos en la BBDD redireccionará a "all_profesor"*/
        }
        return $this->render('GestorBundle:Profesor:new.html.twig',array("form"=>$form->createView() ));

    }

}
