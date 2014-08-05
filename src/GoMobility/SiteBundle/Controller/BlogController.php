<?php

namespace GoMobility\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function actualitesAction()
    {
        return $this->render('GoMobilitySiteBundle:Blog:actualites.html.twig');
    }

    public function actualiteAction($id)
    {
        return $this->render('GoMobilitySiteBundle:Blog:actualite.html.twig', array('id'=>$id));
    }
}
