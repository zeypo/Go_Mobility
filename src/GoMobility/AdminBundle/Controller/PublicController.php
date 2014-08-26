<?php

namespace GoMobility\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublicController extends Controller
{
    public function indexAction()
    {
        return $this->render('GoMobilityAdminBundle:Public:index.html.twig');
    }
}
