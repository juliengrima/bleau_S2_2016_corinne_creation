<?php

namespace CorinneBundle\Controller;


use CorinneBundle\Entity\Categorie;
use CorinneBundle\Entity\Presse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

//  FONCTION D'APPEL DES PAGES QUE L'ON VEUT AFFICHER

    public function indexAction()
    {
        return $this->render('CorinneBundle:Default:index.html.twig');
    }

    public function parcoursAction()
    {
        return $this->render('CorinneBundle:User:parcours.html.twig');
    }

    public function creationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('CorinneBundle:Categorie')->findAll();

        return $this->render('CorinneBundle:User:mes_creations.html.twig', array(
            'categories' => $categories
        ));
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
        $em = $this->getDoctrine()->getManager();
        $presses = $em->getRepository('CorinneBundle:Presse')->findAll();

        return $this->render('@Corinne/User/presse.html.twig', array(
            'presses' => $presses
        ));
    }

    public function eventAction()
    {
        $em = $this->getDoctrine()->getManager();
        $presses = $em->getRepository('CorinneBundle:Presse')->findAll();
        $events = $em->getRepository('CorinneBundle:Event')->findAll();

        foreach ($events as $event) {
            $presse = $em->getRepository('CorinneBundle:Presse')->findBy('');
        }

        return $this->render('@Corinne/User/event.html.twig', array(
            'presses' => $presses,
            'events' => $events
        ));
    }
}
