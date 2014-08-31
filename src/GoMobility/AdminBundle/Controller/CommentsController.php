<?php

namespace GoMobility\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentsController extends Controller
{
    /**
     * Affiche tous les commentaires non publiés
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $comments   = $em->getRepository('GoMobilityCommentBundle:Commentaire')->findByPublish(0);
        if(empty($comments)) $data = array();

        foreach ($comments as $k => $comment) {
            $experience = $comment->getExperience();
            $experienceName = $experience->getStart().'-'.$experience->getArrival();
            
            $data[$experienceName][$k] = $comment;
        }

        if(empty($data)){
            $flashBag = $this->get('session')->getFlashBag();
            $flashBag->get('comment-notice');
            $flashBag->set('comment-notice', 'Aucun commentaire à valider');
        }
        
        return $this->render('GoMobilityAdminBundle:Comments:index.html.twig', array('experiences'=>$data));
    }
}



