<?php

namespace GestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestorBundle\Entity\Empresa;
use GestorBundle\Form\EmpresaType;
use Symfony\Component\HttpFoundation\Request;

class EmpresaController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('GestorBundle:Empresa');
        // find *all* empresas
        $empress = $repository->findAll();
        return $this->render('GestorBundle:Empresa:all.html.twig',array("empresas"=>$empress));
    }

    public function crearEmpresaAction(Request $request)
    {
        $empresa = new Empresa();
        $form=$this->createForm(EmpresaType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated
           $empresa = $form->getData();

           // ... perform some action, such as saving the task to the database
           // for example, if Task is a Doctrine entity, save it!
           $em = $this->getDoctrine()->getManager();
           $em->persist($empresa);
           $em->flush();

           return $this->redirectToRoute('all_Empresa');
        }
        return $this->render('GestorBundle:Empresa:new.html.twig',array("form"=>$form->createView() ));

    }
}
