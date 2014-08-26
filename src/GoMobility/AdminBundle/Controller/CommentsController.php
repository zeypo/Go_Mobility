<?php

namespace GoMobility\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentsController extends Controller
{
    public function indexAction()
    {
        return $this->render('GoMobilityAdminBundle:Comments:index.html.twig');
    }
}
