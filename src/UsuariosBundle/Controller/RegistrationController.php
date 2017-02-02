<?php

namespace UsuariosBundle\Controller;

use UsuariosBundle\Form\UserType;
use UsuariosBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('UsuariosBundle:Default:index.html.twig');
    }
    /**
     * @Route("/usuarios", name="usuarios")
     */
    public function usuariosAction()
    {
        return $this->render('UsuariosBundle:Default:usuarios.html.twig');
    }
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $roles = ["ROLE_USER"];
            $user->setRoles($roles);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
              return $this->redirectToRoute('login');
        }

        return $this->render(
            'UsuariosBundle:Default:register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/usuarios/login", name="login")
     */
    public function loginAction(Request $request)
    {
      $authenticationUtils = $this->get('security.authentication_utils');
      // get the login error if there is one
      $error = $authenticationUtils->getLastAuthenticationError();
      // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();
      return $this->render('UsuariosBundle:Default:login.html.twig', array(
          'last_username' => $lastUsername,
          'error'         => $error,
      ));
    }
}
