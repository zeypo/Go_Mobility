<?php

namespace GoMobility\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GoMobility\SiteBundle\Form\ExperiencesUpdateType;
use GoMobility\SiteBundle\Entity\Experiences;

class ActorsController extends Controller
{
    public function indexAction()
    {
        $repository  = $this->getDoctrine()->getEntityManager()->getRepository('GoMobilitySiteBundle:Experiences');
        $experiences = $repository->findAll();

        // Association des experiences aux users
        foreach ($experiences as $k => $experience) {
            $usermail = $experience->getUser()->getEmail();
            $data[$usermail]['info'] = $experience->getUser();
            $data[$usermail]['experiences'][$k] = $experience;
        }
        
        return $this->render('GoMobilityAdminBundle:Actors:index.html.twig', array('users'=>$data));
    }

    public function showAction($id)
    {
        $repository  = $this->getDoctrine()->getEntityManager()->getRepository('GoMobilitySiteBundle:Experiences');
        $experience = $repository->findOneById($id);
        $form = $this->get('form.factory')->create(new ExperiencesUpdateType(), $experience);

        
        return $this->render('GoMobilityAdminBundle:Actors:update.html.twig', array('form' => $form->createView(), 'experience'=>$experience));
    }

    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('GoMobilitySiteBundle:Experiences');
        $experience = $repository->find($id);

        if (!$experience) {
            throw $this->createNotFoundException('Il n\'y a pas d\'experience correspondant à l\'id : '.$id);
        }
        
        $form = $this->get('form.factory')->create(new ExperiencesUpdateType(), $experience);
        $form->handleRequest($this->getRequest());

        if($form->isValid()){
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice','L\'expérience à bien été mise à jour.');
            return $this->redirect($this->generateUrl('go_mobility_admin_acteurs'));
        }

        exit;
    }
}
