<?php

namespace GoMobility\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GoMobility\SiteBundle\Form\ExperiencesType;
use GoMobility\SiteBundle\Entity\Experiences;

class ExperiencesController extends Controller
{
    /**
     * Retourne l'ensemble des dernières experiences
     */
    public function experiencesAction($page)
    {
        $em             = $this->getDoctrine()->getEntityManager();
        $repository     = $em->getRepository('GoMobilitySiteBundle:Experiences') ;
        
        $experiences       =  $repository->findByPublish(1);

        return $this->render('GoMobilitySiteBundle:Experiences:vos-experiences.html.twig', array('experiences'=>$experiences));
    }

    /**
     * Retourne l'actualité unique designé en paramétre
     * @param id 
     */
    public function experienceAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $experience = $em->getRepository('GoMobilitySiteBundle:Experiences')->findOneById($id);
        
        return $this->render('GoMobilitySiteBundle:Experiences:experience.html.twig', array('experience'=>$experience));
    }

    /**
     * Retourne un formulaire de création d'experience
     */
    public function experienceRegisterAction()
    {
        $form = $this->get('form.factory')->create(new ExperiencesType(), new Experiences());
        return $this->render('GoMobilitySiteBundle:Experiences:cree-experience.html.twig', array('form' => $form->createView()));
    }

    /**
     * Enregistre l'experience en bdd et redirige l'internaute vers toutes les experiences
     */
    public function experienceCreateAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $em = $this->getDoctrine()->getEntityManager();
        
        $form = $this->get('form.factory')->create(new ExperiencesType(), new Experiences());
        $form->handleRequest($this->getRequest());

        if($form->isValid()){
            $experience = $form->getData();
            $email      = $experience->getEmail();
            
            $user = $userManager->findUserByUsername($email);

            if(!$user) {
                $user = $userManager->createUser();
                $user->setUsername($email);
                $user->setEmail($email);
                $user->setPassword('0000');
                $user->setEnabled(true);
                $user->addRole("IS_AUTHENTICATED_ANONYMOUSLY");

                $userManager->updateUser($user);

            }

            //$file = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins='.$experience->getStart().'&destinations='.$experience->getArrival().'&mode='.$experience->getTransport().'&language=fr-FR';
            $start   = str_replace(' ', '%20', $experience->getStart());
            $arrival = str_replace(' ', '%20', $experience->getArrival());
            $file = 'https://maps.googleapis.com/maps/api/directions/json?origin='.$start.'&destination='.$arrival.'&key=AIzaSyDVlnjW-_T8eBYRUS4LCE0fTxxmZpNWhrI';

            
            $json = file_get_contents($file);
            $jsondata = json_decode($json, true);

            //print_r($jsondata['routes'][0]['legs'][0]['distance']['value']);exit;
            
            $experience->setDistance($jsondata['routes'][0]['legs'][0]['distance']['value']);
            $experience->setGes(20);
            $experience->setUser($user);
            $em->persist($experience);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice','Votre experience à bien été posté, elle est en attente de confirmation..');
            return $this->redirect($this->generateUrl('go_mobility_site_experiences'));
        } else {
            throw new \Exception("Formulaire non valide");
            
        }
    }
}
