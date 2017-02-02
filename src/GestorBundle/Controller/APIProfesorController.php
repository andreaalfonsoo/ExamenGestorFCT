<?php

namespace GestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GestorBundle\Entity\Profesor;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class APIProfesorController extends Controller
{
    private function serializeProfesor(Profesor $profesor)
    {
      return array(
          'nombreProfesor' => $profesor->getNombreProfesor(),
          'apellidosProfesor' => $profesor->getApellidosProfesor(),
          'departamentoProfesor' => $profesor->getDepartamentoProfesor(),
      );
    }
    public function getProfesorAction()
    {
        $repository = $this->getDoctrine()->getRepository('GestorBundle:Profesor');
        $profesores = $repository->findAll();

        //var_dump($profesores);
        $data = array('profesores' => array());
        foreach ($profesores as $profesor) {
            $data['profesores'][] = $this->serializeProfesor($profesor);
        }
        $response = new JsonResponse($data, 400);
        return $response;
        //return $this->json($profesores);*/
    }

}
