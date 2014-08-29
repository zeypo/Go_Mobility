<?php

namespace GoMobility\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * Retourne l'ensemble des dernières actualitées
     */
    public function actualitesAction($page)
    {
        $maxArticles  = 2;
        $em           = $this->getDoctrine()->getEntityManager();
        $repository   = $em->getRepository('GoMobilitySiteBundle:Articles') ;
        
        $articles   =  $repository->findByStatus(1);
        $articles_count = count($articles);

        $pagination = array(
            'page' => $page,
            'route' => 'go_mobility_site_actualites',
            'pages_count' => ceil($articles_count / $maxArticles),
            'route_params' => array()
        );

         $articles = $repository->getList($page, $maxArticles);
        
        return $this->render('GoMobilitySiteBundle:Blog:actualites.html.twig', array('articles'=>$articles, 'pagination'=>$pagination));
    }

    /**
     * Retourne l'actualité unique designé en paramétre
     * @param id 
     */
    public function actualiteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $article =  $em->getRepository('GoMobilitySiteBundle:Articles')->find($id);
        return $this->render('GoMobilitySiteBundle:Blog:actualite.html.twig', array('article'=>$article));
    }
}
