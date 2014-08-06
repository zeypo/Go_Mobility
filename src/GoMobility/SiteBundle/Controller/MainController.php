<?php

namespace GoMobility\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('GoMobilitySiteBundle:Home:index.html.twig');
    }


    public function projetAction()
    {
        return $this->render('GoMobilitySiteBundle:Projet:presentation.html.twig');
    }
}
