<?php

namespace App\Controller;

use App\Entity\Media;
use App\Form\MediaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MediaController extends AbstractController {

  

    /**
     * @Route("/pictueSave" , name="pictueSave")
     * 
     */
    public function updatePicture(Request $request) {

      $image = new Media();
      $form = $this->createForm(MediaType::class, $image);
      $form->handleRequest($request);
      
      if($form->isSubmitted() && $form->isValid()){
          
          $this->getDoctrine()->getManager()->persist($form->getData());
          $this->getDoctrine()->getManager()->flush();
          return $this->redirectToRoute('home');
      }
      
      
        return $this->render('picture/picture_edit.html.twig', array(
             'form' => $form->createView() 
        ));
    }

}
