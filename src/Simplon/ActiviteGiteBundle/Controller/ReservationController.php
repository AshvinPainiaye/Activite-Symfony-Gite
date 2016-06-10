<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Client;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;
use Simplon\ActiviteGiteBundle\Entity\Gite;
use Simplon\ActiviteGiteBundle\Entity\Chambres;
use Simplon\ActiviteGiteBundle\Entity\Reservation;


class ReservationController extends Controller
{
  /**
   * @route("/reservation/{clientId}/{chambresId}")
   */

  public function createAction($clientId, $chambresId)
  {

    $client = $this->getDoctrine()
    ->getRepository('SimplonActiviteGiteBundle:Client')
    ->find($clientId);

    $chambres = $this->getDoctrine()
    ->getRepository('SimplonActiviteGiteBundle:Chambres')
    ->find($chambresId);


    $reservation = $this->creerReservation('9 Juin 2016', 'Non effectuer', 'VISA', $client, $chambres);

    $em = $this->getDoctrine()->getManager();
    $em->persist($reservation);
    $em->flush();

    return $this->render('SimplonActiviteGiteBundle:Default:index.html.twig');
  }

  protected function creerReservation($date, $statut, $paiement, $client, $chambres)
   {
       $reservation = new Reservation();
       $reservation->setDate($date)
              ->setStatut($statut)
              ->setPaiement($paiement)
              ->setClient($client)
              ->setChambres($chambres)
     ;
       return $reservation;
   }


}
