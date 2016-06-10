<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Client;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;
use Simplon\ActiviteGiteBundle\Entity\Chambres;
use Simplon\ActiviteGiteBundle\Entity\Reservation;
use Simplon\ActiviteGiteBundle\Entity\Gites;




class GiteController extends Controller
{
  /**
   * @route("/gite")
   */

  public function createAction()
  {
    $gite = $this->creerGite('PAINIAYE', '15 rue saphirs St gille', '0262123456', 'gite@painiaye.com');

    $em = $this->getDoctrine()->getManager();
    $em->persist($gite);
    $em->flush();
      return $this->render('SimplonActiviteGiteBundle:Default:index.html.twig');
  }


  protected function creerGite($nom, $adresse, $tel, $email)
   {
       $gite = new Gites();
       $gite->setNom($nom)
              ->setAdresse($adresse)
              ->setTel($tel)
              ->setEmail($email)
     ;

       return $gite;
   }

}
