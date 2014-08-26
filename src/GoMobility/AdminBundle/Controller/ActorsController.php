<?php

namespace GoMobility\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActorsController extends Controller
{
    public function indexAction()
    {
        return $this->render('GoMobilityAdminBundle:Actors:index.html.twig');
    }
}
