<?php

namespace CorinneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('CorinneBundle:Categorie')->findAll();

        return $this->render('CorinneBundle:Default:index.html.twig', array(
                'categories' => $categories
        ));
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

    public function atelierAction()
    {
        return $this->render('CorinneBundle:User:atelier.html.twig');
    }

    public function accessAction()
    {
        return $this->render('@Corinne/access.html.twig');
    }

    public function presseAction()
    {
        return $this->render('@Corinne/User/presse.twig');
    }
}
