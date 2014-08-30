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
    public function experiencesAction()
    {
        $repository  = $this->getDoctrine()->getEntityManager()->getRepository('GoMobilitySiteBundle:Experiences');
        $experiences = $repository->findByPublish(1);

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
        $keywordRepo = $em->getRepository('GoMobilitySiteBundle:Keyword');
        
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
                $user->setEmailCanonical(strtolower($email));
                $user->setPassword('0000');
                $user->setEnabled(true);
                $user->addRole('IS_AUTHENTICATED_ANONYMOUSLY');

                $userManager->updateUser($user);

            }

            $experience->setGes(20);
            $experience->setUser($user);

            print($experience);exit;

            $em->persist($experience);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice','Votre experience à bien été posté, elle est en attente de confirmation..');
            return $this->redirect($this->generateUrl('go_mobility_site_experiences'));
        } else {
            throw new \Exception("Formulaire non valide");
            
        }
    }
}
