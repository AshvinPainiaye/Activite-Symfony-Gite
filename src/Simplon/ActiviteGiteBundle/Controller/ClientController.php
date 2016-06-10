<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Chambres;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;
use Simplon\ActiviteGiteBundle\Entity\Gite;
use Simplon\ActiviteGiteBundle\Entity\Reservation;
use Simplon\ActiviteGiteBundle\Entity\Client;



class ClientController extends Controller
{
  /**
   * @route("/client")
   */
  public function createAction()
  {

    $client = $this->creerClient('Salazie', 'Chouchou', '0692123456', 'chouchou@salazie.re');

    $em = $this->getDoctrine()->getManager();
    $em->persist($client);

    $em->flush();

      return $this->render('SimplonActiviteGiteBundle:Default:index.html.twig');
  }

  protected function creerClient($nom, $prenom, $tel, $email)
   {
       $client = new Client();
       $client->setNom($nom)
              ->setPrenom($prenom)
              ->setTel($tel)
              ->setEmail($email)
     ;

       return $client;
   }


}
