<?php

namespace CorinneBundle\Controller;

use CorinneBundle\CorinneBundle;
use CorinneBundle\Entity\Presse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

//    FONCTIONS D'APPEL POUR AFFICHER LA PRESSE
    public function sourceAction()
    {
        $em = $this->getDoctrine()->getManager();
            $presses = $em->getRepository('CorinneBundle:Presse.php')->findAll();

        return $this->render('@Corinne/User/presse.html.twig', array(
                'presses' => $presses
        ));
    }

//    FONCTIONS D'APPEL POUR AFFICHER LES OBJETS



//  FONCTION D'APPEL DES PAGES QUE L'ON VEUT AFFICHER

    public function indexAction()
    {
        return $this->render('@Corinne/Default/index.html.twig');
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
        return $this->render('@Corinne/User/presse.html.twig');
    }
}
