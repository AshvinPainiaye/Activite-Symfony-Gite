<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Client;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;
use Simplon\ActiviteGiteBundle\Entity\Chambres;
use Simplon\ActiviteGiteBundle\Entity\Reservation;
use Simplon\ActiviteGiteBundle\Entity\Gites;
use Symfony\Component\HttpFoundation\Request;
use Simplon\ActiviteGiteBundle\Form\GitesType;

class GiteController extends Controller
{
  /**
   * @route("/gite")
   */

   public function insertAction(Request $request)
   {
     //l'entité Gite
     $gites = new Gites();

     //créer le formulaire à partir GiteType et fait un lien avec l'entité Gite
     $gitesForm = $this->createForm(GitesType::class,$gites);

     //Récupère les données soumises par le formulaire et l'insère dans l'entité Gite
     $gitesForm->handleRequest($request);

     //Enregistrer le formulaire uniquement quand celui-ci a été soumis et qu'il est valide
     if ($gitesForm->isSubmitted() && $gitesForm->isValid()) {
       $em = $this->getDoctrine()->getManager();
       $em->persist($gites);
       $em->flush();
     }

     return $this->render('SimplonActiviteGiteBundle:Default:gites.html.twig', array(
       //transforme le formulaire pour être générable par Twig dans la vue
       'gitesForm'=>$gitesForm->createView()
     ));
   }
}
