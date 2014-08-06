<?php

namespace GoMobility\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * Retourne l'ensemble des dernières actualitées
     */
    public function actualitesAction()
    {
        return $this->render('GoMobilitySiteBundle:Blog:actualites.html.twig');
    }

    /**
     * Retourne l'actualité unique designé en paramétre
     * @param id 
     */
    public function actualiteAction($id)
    {
        return $this->render('GoMobilitySiteBundle:Blog:actualite.html.twig', array('id'=>$id));
    }
}
