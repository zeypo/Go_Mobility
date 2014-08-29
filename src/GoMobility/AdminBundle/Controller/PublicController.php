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
        $em = $this->getDoctrine()->getEntityManager();
        $articles =  $em->getRepository('GoMobilitySiteBundle:Articles')->findAll();
        
        return $this->render('GoMobilityAdminBundle:Public:index.html.twig', array('articles'=>$articles));
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

            $em->persist($article);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice','Votre experience à bien été posté, elle est en attente de confirmation..');
            return $this->redirect($this->generateUrl('go_mobility_admin_public'));
        } else {
            throw new \Exception("Formulaire non valide");
            
        }
    }

    public function showAction($id)
    {
        $repository  = $this->getDoctrine()->getEntityManager()->getRepository('GoMobilitySiteBundle:Articles');
        $article = $repository->findOneById($id);
        $form = $this->get('form.factory')->create(new ArticlesType(), $article);

        
        return $this->render('GoMobilityAdminBundle:Public:update.html.twig', array('form' => $form->createView(), 'article'=>$article));
    }

    /**
     * Permet de mettre à jour un article
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('GoMobilitySiteBundle:Articles');
        $experience = $repository->find($id);

        if (!$experience) {
            throw $this->createNotFoundException('Il n\'y a pas d\'experience correspondant à l\'id : '.$id);
        }
        
        $form = $this->get('form.factory')->create(new ArticlesType(), $experience);
        $form->handleRequest($this->getRequest());

        if($form->isValid()){
            $article = $form->getData();
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice','L\'article à bien été mise à jour.');
            return $this->redirect($this->generateUrl('go_mobility_admin_public'));
        }

        exit;
    }
}
