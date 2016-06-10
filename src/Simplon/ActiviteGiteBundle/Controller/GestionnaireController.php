<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActiviteGiteBundle\Entity\Client;
use Simplon\ActiviteGiteBundle\Entity\Chambres;
use Simplon\ActiviteGiteBundle\Entity\Gite;
use Simplon\ActiviteGiteBundle\Entity\Reservation;
use Simplon\ActiviteGiteBundle\Entity\Gestionnaire;


class GestionnaireController extends Controller
{
  /**
   * @route("/gestionnaire/{gestionnaireId}")
   */
  public function createAction($gestionnaireId)
  {

    $gites = $this->getDoctrine()
    ->getRepository('SimplonActiviteGiteBundle:Gites')
    ->find($gestionnaireId);

    $gestionnaire = $this->creerGestionnaire('Painiaye', 'Ashvin', '0692123456', $gites);

    $em = $this->getDoctrine()->getManager();
    $em->persist($gestionnaire);
    $em->flush();

      return $this->render('SimplonActiviteGiteBundle:Default:index.html.twig');
  }


  protected function creerGestionnaire($nom, $prenom, $tel, $gites)
   {
       $gestionnaire = new Gestionnaire();
       $gestionnaire->setNom($nom)
              ->setPrenom($prenom)
              ->setTel($tel)
              ->setGites($gites);
     ;
       return $gestionnaire;
   }

}
