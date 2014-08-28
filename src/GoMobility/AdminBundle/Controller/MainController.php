<?php

namespace GoMobility\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GoMobility\SiteBundle\Entity\Experiences;

class MainController extends Controller
{
    public function indexAction()
    {
        $repoExp   = $this->getDoctrine()->getEntityManager()->getRepository('GoMobilitySiteBundle:Experiences');
        $repoUsers = $this->getDoctrine()->getEntityManager()->getRepository('GoMobilityUserBundle:User');
        $experiences = $repoExp->findAll();
        $users = $this->getDoctrine()->getRepository('GoMobilityUserBundle:User')->findByNot('roles', 'IS_AUTHENTICATED_ANONYMOUSLY');
        
        $data['experiences']['total'] = count($experiences);
        $data['experiences']['touristique'] = 0;
        $data['experiences']['sportif'] = 0;
        $data['experiences']['work'] = 0;
        $data['users'] = count($users);
        
        foreach ($experiences as $experience) {
            $transport = $experience->getTransport();
            $data['experiences'][$transport] += 1;
        }
        
        return $this->render('GoMobilityAdminBundle:Common:index.html.twig', array('data'=>$data));
    }
}
