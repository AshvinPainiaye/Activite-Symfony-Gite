<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Client;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;
use Simplon\ActiviteGiteBundle\Entity\Gite;
use Simplon\ActiviteGiteBundle\Entity\Reservation;
use Simplon\ActiviteGiteBundle\Entity\Chambres;


class ChambreController extends Controller
{
  /**
   * @route("/chambre/{giteId}/{clientId}")
   */
  public function createAction($giteId, $clientId)
  {

    $gites = $this->getDoctrine()
    ->getRepository('SimplonActiviteGiteBundle:Gites')
    ->find($giteId);

    $client = $this->getDoctrine()
    ->getRepository('SimplonActiviteGiteBundle:Client')
    ->find($clientId);

     $chambres = $this->creerChambre('2', 'Disponible', '400 euros', $gites, $client);

     $em = $this->getDoctrine()->getManager();
     $em->persist($chambres);
     $em->flush();

      return $this->render('SimplonActiviteGiteBundle:Default:index.html.twig');
  }

  protected function creerChambre($nombrePlace, $disponible, $prix, $gites, $client)
   {
       $chambres = new Chambres();
       $chambres->setNombrePlace($nombrePlace)
              ->setDisponible($disponible)
              ->setPrix($prix)
              ->setGites($gites)
              ->setClient($client)
     ;

       return $chambres;
   }

}
