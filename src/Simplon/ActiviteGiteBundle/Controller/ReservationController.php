<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Client;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;
use Simplon\ActiviteGiteBundle\Entity\Gite;
use Simplon\ActiviteGiteBundle\Entity\Chambres;
use Simplon\ActiviteGiteBundle\Entity\Reservation;
use Symfony\Component\HttpFoundation\Request;
use Simplon\ActiviteGiteBundle\Form\ReservationType;

class ReservationController extends Controller
{
  /**
   * @route("/reservation/{clientId}/{chambresId}")
   */

   public function insertAction($clientId, $chambresId, Request $request)
   {

   $client = $this->getDoctrine()
     ->getRepository('SimplonActiviteGiteBundle:Client')
     ->find($clientId);

     $chambres = $this->getDoctrine()
     ->getRepository('SimplonActiviteGiteBundle:Chambres')
     ->find($chambresId);

     //l'entité Reservation
     $reservation = new Reservation();
     $reservation->setClient($client);
     $reservation->setChambres($chambres);

     //créer le formulaire à partir ReservationType et fait un lien avec l'entité Reservation
     $reservationForm = $this->createForm(ReservationType::class,$reservation);

     //Récupère les données soumises par le formulaire et l'insère dans l'entité Reservation
     $reservationForm->handleRequest($request);

     //Enregistrer le formulaire uniquement quand celui-ci a été soumis et qu'il est valide
     if ($reservationForm->isSubmitted() && $reservationForm->isValid()) {
       $em = $this->getDoctrine()->getManager();
       $em->persist($reservation);
       $em->flush();
     }

     return $this->render('SimplonActiviteGiteBundle:Default:reservation.html.twig', array(
       //transforme le formulaire pour être générable par Twig dans la vue
       'reservationForm'=>$reservationForm->createView()
     ));
   }
}
