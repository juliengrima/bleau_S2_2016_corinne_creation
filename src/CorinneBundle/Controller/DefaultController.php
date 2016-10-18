<?php

namespace CorinneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CorinneBundle:Default:index.html.twig');
    }
}
