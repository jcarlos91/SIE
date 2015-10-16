<?php

namespace SIEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SIEBundle:Default:index.html.twig');
    }
}
