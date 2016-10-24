<?php

namespace CorinneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

//        return $this->render('X', array(
//                'categories' => $categories
//        ));
    }

    public function parcourAction()
    {
        return $this->render('CorinneBundle:User:parcour.html.twig');
    }

    public function creationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('CorinneBundle:Categorie')->findAll();

//        foreach ($categories as $categorie):
//            $sousCategories = $em->getRepository('CorinneBundle:SousCategorie')->findBy(
//                array('categorie' => $categorie
//                ));
//        var_dump($sousCategories);
//        endforeach;
//        $sousCategories = $em->getRepository('CorinneBundle:SousCategorie')->findAll();

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
        return $this->render('@Corinne/User/presse.twig');
    }
}
