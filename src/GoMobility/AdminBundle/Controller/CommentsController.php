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

        foreach ($comments as $k => $comment) {
            $experience = $comment->getExperience();
            $experienceName = $experience->getStart().'-'.$experience->getArrival();
            
            $data[$experienceName][$k] = $comment;
        }
        
        return $this->render('GoMobilityAdminBundle:Comments:index.html.twig', array('experiences'=>$data));
    }
}



