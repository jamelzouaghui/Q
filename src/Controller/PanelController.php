<?php

namespace App\Controller;

use App\Entity\PanelEntity;
use App\Form\PanelEntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PanelController extends AbstractController {

    /**
     * @Route("/panels" , name="panels")
     * 
     */
    public function index(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $panelEntity = $em->getRepository('App\Entity\PanelEntity')->findAll();

        return $this->render('panel/index.html.twig', [
                    'panelEntity' => $panelEntity
                        ]
        );
    }

}
