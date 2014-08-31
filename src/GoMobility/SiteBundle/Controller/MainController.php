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
        $experience     = $em->getRepository('GoMobilitySiteBundle:Experiences')->getLastExperiences(1)[0];
        $mapexperiences['touristique'] = $em->getRepository('GoMobilitySiteBundle:Experiences')->getBestExperienceByTransport('touristique')[0]; 
        $mapexperiences['work']        = $em->getRepository('GoMobilitySiteBundle:Experiences')->getBestExperienceByTransport('work')[0]; 
        $mapexperiences['sport']       = $em->getRepository('GoMobilitySiteBundle:Experiences')->getBestExperienceByTransport('sportif')[0]; 
        
        $articles       = $em->getRepository('GoMobilitySiteBundle:Articles')->getLastExperiences(2);
        
        $user = $experience->getUser();

        return $this->render('GoMobilitySiteBundle:Home:index.html.twig', array('experience'=>$experience, 'articles'=>$articles, 'mapexperiences'=>$mapexperiences, 'user'=>$user));
    }


    /**
     * Présentation du projet
     */
    public function projetAction()
    {
        return $this->render('GoMobilitySiteBundle:Projet:presentation.html.twig');
    }
}
