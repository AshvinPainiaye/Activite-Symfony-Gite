<?php

namespace Simplon\ActiviteGiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SimplonActiviteGiteBundle:Default:index.html.twig');
    }
}
