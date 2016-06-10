<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Client;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;
use Simplon\ActiviteGiteBundle\Entity\Gite;
use Simplon\ActiviteGiteBundle\Entity\Reservation;
use Simplon\ActiviteGiteBundle\Entity\Chambres;
use Symfony\Component\HttpFoundation\Request;
use Simplon\ActiviteGiteBundle\Form\ChambresType;


class ChambreController extends Controller
{
  /**
   * @route("/chambre/{gitesId}/{clientId}")
   */

   public function insertAction($gitesId, $clientId, Request $request)
   {
     $gites = $this->getDoctrine()
     ->getRepository('SimplonActiviteGiteBundle:Gites')
     ->find($gitesId);

     $client = $this->getDoctrine()
     ->getRepository('SimplonActiviteGiteBundle:Client')
     ->find($clientId);

     //l'entité Chambres
     $chambres = new Chambres();

     $chambres->setGites($gites);
     $chambres->setClient($client);

     //créer le formulaire à partir ChambresType et fait un lien avec l'entité Chambres
     $chambresForm = $this->createForm(ChambresType::class,$chambres);

     //Récupère les données soumises par le formulaire et l'insère dans l'entité Chambres
     $chambresForm->handleRequest($request);

     //Enregistrer le formulaire uniquement quand celui-ci a été soumis et qu'il est valide
     if ($chambresForm->isSubmitted() && $chambresForm->isValid()) {

       $em = $this->getDoctrine()->getManager();
       $em->persist($chambres);
       $em->flush();
     }

     return $this->render('SimplonActiviteGiteBundle:Default:chambres.html.twig', array(
       //transforme le formulaire pour être générable par Twig dans la vue
       'chambresForm'=>$chambresForm->createView()
     ));
   }
}
