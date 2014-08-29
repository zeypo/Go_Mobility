<?php

namespace GoMobility\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GoMobility\SiteBundle\Form\ArticlesType;
use GoMobility\SiteBundle\Entity\Articles;

class PublicController extends Controller
{
    /**
     * Liste des articles avec possibilité de suppression
     */
    public function indexAction()
    {
        return $this->render('GoMobilityAdminBundle:Public:index.html.twig');
    }

    /**
     * Affiche un formulaire de création d'articles
     */
    public function createAction()
    {
        $form = $this->get('form.factory')->create(new ArticlesType(), new Articles());
        return $this->render('GoMobilityAdminBundle:Public:cree-article.html.twig', array('form' => $form->createView()));
    }

    /**
     * Enregistre l'experience en bdd et redirige l'internaute vers toutes les experiences
     */
    public function saveAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $form = $this->get('form.factory')->create(new ArticlesType(), new Articles());
        $form->handleRequest($this->getRequest());

        if($form->isValid()){
            $article = $form->getData();

            print_r($article);exit;

            $em->persist($experience);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice','Votre experience à bien été posté, elle est en attente de confirmation..');
            return $this->redirect($this->generateUrl('go_mobility_site_experiences'));
        } else {
            throw new \Exception("Formulaire non valide");
            
        }
    }
}
