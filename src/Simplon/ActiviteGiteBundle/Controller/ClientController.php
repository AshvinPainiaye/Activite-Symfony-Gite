<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Chambres;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;
use Simplon\ActiviteGiteBundle\Entity\Gite;
use Simplon\ActiviteGiteBundle\Entity\Reservation;
use Simplon\ActiviteGiteBundle\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Simplon\ActiviteGiteBundle\Form\ClientType;

class ClientController extends Controller
{
  /**
   * @route("/client")
   */

   public function insertAction(Request $request)
   {
     //l'entité Client
     $client = new Client();

     //créer le formulaire à partir ClientType et fait un lien avec l'entité Client
     $clientForm = $this->createForm(ClientType::class,$client);

     //Récupère les données soumises par le formulaire et l'insère dans l'entité Client
     $clientForm->handleRequest($request);

     //Enregistrer le formulaire uniquement quand celui-ci a été soumis et qu'il est valide
     if ($clientForm->isSubmitted() && $clientForm->isValid()) {
       $em = $this->getDoctrine()->getManager();
       $em->persist($client);
       $em->flush();
     }

     return $this->render('SimplonActiviteGiteBundle:Default:client.html.twig', array(
       //transforme le formulaire pour être générable par Twig dans la vue
       'clientForm'=>$clientForm->createView()
     ));
   }
}
