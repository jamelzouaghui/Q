<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController as REST;

class PanelController extends REST {

    /**
     * @Route("/panels" , name="panels", methods="GET")
     * 
     */
    public function index(Request $request) {
        return $this->render('panel/index.html.twig');
    }

    /**

     * 
     *  @Route("/listpanels" , name="listpanels", options={"expose"=true}, methods="GET")
     * @return array
     */
    public function getContactsAction() {
        $panels = $this->getDoctrine()->getRepository('App\Entity\PanelEntity')->findAll();

        $response['panels'] = $this->getPanelsAsArray($panels);

        $view = $this->view($response, 200)->setFormat("json");
        return $this->handleView($view);
    }

    public function getPanelsAsArray($panels) {
        $response = array();
        foreach ($panels as $panel) {
            $firstname = $panel->getFirstname();
            $lastname = $panel->getLastname();
            $societe = $panel->getSociete();
            $application = $panel->getApplication();

            $taille = $panel->getTaille();
            $solution = $panel->getSolution();
            $marque = $panel->getMarque();
            $corps = $panel->getCorpeOne();
            $departement = $panel->getDepartement();
            $distribution = $panel->getDistribution();

            $response[] = array(
                'id' => $panel->getId(),
                'firstname' => $firstname,
                'lastname' => $lastname,
                'application' => $application,
                'societe' => $societe,
                'taille' => $taille,
                'solution' => $solution,
                'marque' => $marque,
                'corps' => $corps,
                'departement' => $departement,
                'distribution' => $distribution,
            );
        }
        return $response;
    }

}
