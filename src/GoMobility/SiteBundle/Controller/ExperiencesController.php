<?php

namespace GoMobility\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExperiencesController extends Controller
{
    public function experiencesAction()
    {
        return $this->render('GoMobilitySiteBundle:Experiences:vos-experiences.html.twig');
    }

    public function experienceAction($id)
    {
        return $this->render('GoMobilitySiteBundle:Experiences:experience.html.twig', array('id'=>$id));
    }

    public function experienceCreateAction()
    {
        return $this->render('GoMobilitySiteBundle:Experiences:cree-experience.html.twig');
    }
}
