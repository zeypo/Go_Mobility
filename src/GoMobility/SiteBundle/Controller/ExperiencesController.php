<?php

namespace GoMobility\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExperiencesController extends Controller
{
    /**
     * Retourne l'ensemble des dernières experiences
     */
    public function experiencesAction()
    {
        return $this->render('GoMobilitySiteBundle:Experiences:vos-experiences.html.twig');
    }

    /**
     * Retourne l'actualité unique designé en paramétre
     * @param id 
     */
    public function experienceAction($id)
    {
        return $this->render('GoMobilitySiteBundle:Experiences:experience.html.twig', array('id'=>$id));
    }

    /**
     * Retourne un formulaire de création d'experience
     */
    public function experienceCreateAction()
    {
        return $this->render('GoMobilitySiteBundle:Experiences:cree-experience.html.twig');
    }
}
