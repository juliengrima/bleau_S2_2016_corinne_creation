<?php

namespace CorinneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CorinneBundle:Default:index.html.twig');
    }
    
    public function parcourAction()
    {
        return $this->render('CorinneBundle:User:parcour.html.twig');
    }

    public function creationAction()
    {
        return $this->render('CorinneBundle:User:mes_creations.html.twig');
    }

    public function ecolabelAction()
    {
        return $this->render('CorinneBundle:User:eco_label.html.twig');
    }

    public function contactAction()
    {
        return $this->render('CorinneBundle:User:contact.html.twig');
    }
}