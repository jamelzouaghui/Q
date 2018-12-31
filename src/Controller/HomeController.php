<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller {

    /**
     * @Route("/" , name="homepage")
     * @return Response
     */
    public function indexAction() {
        $number = random_int(0, 100);
        return $this->render('pages/home.html.twig', [
                    'number' => $number,
        ]);
    }

}
