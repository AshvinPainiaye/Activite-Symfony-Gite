<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Client;
use Simplon\ActiviteGiteBundle\Entity\Chambres;
use Simplon\ActiviteGiteBundle\Entity\Gite;
use Simplon\ActiviteGiteBundle\Entity\Reservation;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;
use Symfony\Component\HttpFoundation\Request;
use Simplon\ActiviteGiteBundle\Form\GestionnaireType;

class GestionnaireController extends Controller
{
  /**
   * @route("/gestionnaire/{gitesId}")
   */

   public function insertAction($gitesId, Request $request)
   {
     $gites = $this->getDoctrine()
     ->getRepository('SimplonActiviteGiteBundle:Gites')
     ->find($gitesId);

     //l'entité Gestionnaire
     $gestionnaire = new Gestionnaire();
     $gestionnaire->setGites($gites);

     //créer le formulaire à partir GestionnaireType et fait un lien avec l'entité Gestionnaire
     $gestionnaireForm = $this->createForm(GestionnaireType::class,$gestionnaire);

     //Récupère les données soumises par le formulaire et l'insère dans l'entité Gestionnaire
     $gestionnaireForm->handleRequest($request);

     //Enregistrer le formulaire uniquement quand celui-ci a été soumis et qu'il est valide
     if ($gestionnaireForm->isSubmitted() && $gestionnaireForm->isValid()) {
       $em = $this->getDoctrine()->getManager();
       $em->persist($gestionnaire);
       $em->flush();
     }

     return $this->render('SimplonActiviteGiteBundle:Default:gestionnaires.html.twig', array(
       //transforme le formulaire pour être générable par Twig dans la vue
       'gestionnaireForm'=>$gestionnaireForm->createView()
     ));
   }
}
