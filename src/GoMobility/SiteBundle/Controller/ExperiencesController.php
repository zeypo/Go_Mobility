<?php

namespace GoMobility\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GoMobility\SiteBundle\Form\ExperiencesType;
use GoMobility\SiteBundle\Entity\Experiences;

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
    public function experienceRegisterAction()
    {
        $form = $this->get('form.factory')->create(new ExperiencesType(), new Experiences());
        return $this->render('GoMobilitySiteBundle:Experiences:cree-experience.html.twig', array('form' => $form->createView()));
    }

    public function experienceCreateAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->get('form.factory')->create(new ExperiencesType(), new Experiences());
        $form->handleRequest($this->getRequest());

        if($form->isValid()){
            $experience = $form->getData();
            $em->persist($experience->getEmail());
            $em->persist($experience->getTransport());
            $em->persist($experience->getStart());
            $em->persist($experience->getArrival());
            $em->persist($experience->getDescription());
            $em->persist($experience->getGame());
            $em->flush();
        }

        exit;

    }
}
