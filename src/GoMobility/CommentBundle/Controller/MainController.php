<?php

namespace GoMobility\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GoMobility\CommentBundle\Form\CommentaireType;
use GoMobility\CommentBundle\Entity\Commentaire;

class MainController extends Controller
{
    /**
     * Affiche le formulaire pour ajouter un commentaire
     */
    public function showformAction($articleid)
    {
        $form = $this->get('form.factory')->create(new CommentaireType(), new Commentaire());
        return $this->render('GoMobilityCommentBundle:Common:form.html.twig', array(
            'form' => $form->createView(),
            'articleid' => $articleid
        ));
    }

    /**
     * Affiche les commentaires liés à l'article
     */
    public function showcommentsAction($articleid)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $experience = $em->getRepository('GoMobilitySiteBundle:Experiences')->findOneById($articleid);
        $comments   = $em->getRepository('GoMobilityCommentBundle:Commentaire')->findByexperience($experience);

        foreach ($comments as $k => $comment) {
            if($comment->getPublish() == false) unset($comments[$k]);
        }

        return $this->render('GoMobilityCommentBundle:Common:comments-list.html.twig', array('comments'=>$comments));
    }

    /**
     * Créer et enregistre le commentaire en bdd
     */
    public function createAction($articleid)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $form = $this->get('form.factory')->create(new CommentaireType(), new Commentaire());
        $form->handleRequest($this->getRequest());

        if($form->isValid()){
            $repository = $em->getRepository('GoMobilitySiteBundle:Experiences');
            $article = $repository->find($articleid);
            $comment = $form->getData();
            $comment->setExperience($article);

            $em->persist($comment);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice','Votre commentaire à bien été posté, il est en attente de confirmation');
            return $this->redirect($this->generateUrl('go_mobility_site_experiences'));
        } else {
            throw new \Exception("Formulaire non valide");
            
        }
    }
}
