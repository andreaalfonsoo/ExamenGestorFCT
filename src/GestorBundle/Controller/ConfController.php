<?php

namespace GestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestorBundle\Entity\Conf;

class ConfController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('GestorBundle:Conf');
        // find *all* conf
        $conf = $repository->findAll();
        return $this->render('GestorBundle:Conf:all.html.twig',array("conf"=>$conf));
    }

    public function crearConfAction(Request $request)
    {
        $conf = new Conf();
        $form=$this->createForm(ConfType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated
           $conf = $form->getData();

           // ... perform some action, such as saving the task to the database
           // for example, if Task is a Doctrine entity, save it!
           $co = $this->getDoctrine()->getManager();
           $co->persist($conf);
           $co->flush();

           return $this->redirectToRoute('all_Conf');
        }
        return $this->render('GestorBundle:Conf:new.html.twig',array("form"=>$form->createView() ));

    }

}