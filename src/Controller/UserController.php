<?php

namespace App\Controller;

use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController {

    /**
     * @Route("/users" , name="users")
     * 
     */
    public function index(Request $request) {

   $em = $this->getDoctrine()->getManager();
   $users = $em->getRepository('App\Entity\User')->findAll();
 
        return $this->render('users/index.html.twig', [
           'users'=> $users
                        ]
        );
    }

}
