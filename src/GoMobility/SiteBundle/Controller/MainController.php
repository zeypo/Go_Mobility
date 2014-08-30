<?php

namespace GoMobility\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /**
     * Home
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $experience = $em->getRepository('GoMobilitySiteBundle:Experiences')->getLastExperiences(1);
        $articles   = $em->getRepository('GoMobilitySiteBundle:Articles')->getLastExperiences(2);
        
        return $this->render('GoMobilitySiteBundle:Home:index.html.twig', array('experience'=>$experience, 'articles'=>$articles));
    }


    /**
     * Présentation du projet
     */
    public function projetAction()
    {
        return $this->render('GoMobilitySiteBundle:Projet:presentation.html.twig');
    }
}
