<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends Controller {

    /**
     * @Route("/biens" , name="property_index")
     * @return Response
     */
    public function indexAction() {
        $number = '20';
        $property = new Property();
        $property->setTitle('mon premier bien')
                ->setPrice(20000)
                ->setRooms(4)
                ->setDescription('une petite description')
                ->setSurface(40)
                ->setFloor(4)
                ->setHeat(1)
                ->setCity('Paris')
                ->setAddress('15 rue de france');
        $em = $this->getDoctrine()->getManager();

        $em->persist($property);
      
        $em->flush();
        return $this->render('pages/home.html.twig', [
                    'number' => $number,
        ]);
    }

}
