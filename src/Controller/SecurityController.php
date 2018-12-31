<?php

namespace App\Controller;

use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController {

    /**
     * @Route("/login" , name="login")
     * 
     */
    public function login(Request $request, AuthenticationUtils $utils) {


        $lastUsername = $utils->getLastUsername();
        $error = $utils->getLastAuthenticationError();


        return $this->render('security/login.html.twig', [
                    'last_username' => $lastUsername,
                    'error' => $error,
                        ]
        );
    }

}
