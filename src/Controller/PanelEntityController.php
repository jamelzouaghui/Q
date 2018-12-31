<?php

namespace App\Controller;

use App\Entity\PanelEntity;
use App\Form\PanelEntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PanelEntityController extends AbstractController {

    /**
     * @Route("/contacts" , name="contacts")
     * 
     */
    public function index(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $panelEntity = $em->getRepository('App\Entity\PanelEntity')->findAll();

        return $this->render('panelEntity/index.html.twig', [
                    'panelEntity' => $panelEntity
                        ]
        );
    }

    /**
     * @Route("/addContact" , name="add-contact")
     * 
     */
    public function addContact(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $contact = new PanelEntity();
        $form = $this->createForm(PanelEntityType::class, $contact);

        return $this->render('panelEntity/addContact.html.twig', [
                    'form' => $form->createView()
                        ]
        );
    }

}
