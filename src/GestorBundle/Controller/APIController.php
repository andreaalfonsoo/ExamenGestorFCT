<?php

namespace GestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GestorBundle\Entity\Empresa;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class APIController extends Controller
{
    private function serializeEmpresa(Empresa $empresa)
    {
      return array(
          'nombreEmpresa' => $empresa->getNombreEmpresa(),
          'direccionEmpresa' => $empresa->getDireccionEmpresa(),
          'cp' => $empresa->getCp(),
          'telefono1Empresa' => $empresa->getTelefono1Empresa(),
          'telefono2Empresa' => $empresa->getTelefono2Empresa(),
          'fechaCreacionEmpresa' => $empresa->getFechaCreacionEmpresa(),
      );
    }
    public function getEmpresasAction()
    {
        $repository = $this->getDoctrine()->getRepository('GestorBundle:Empresa');
        $empresas = $repository->findAll();

        //var_dump($empresas);
        $data = array('empresas' => array());
        foreach ($empresas as $empresa) {
            $data['empresas'][] = $this->serializeEmpresa($empresa);
        }
        $response = new JsonResponse($data, 400);
        return $response;
        //return $this->json($empresas);*/
    }

}
