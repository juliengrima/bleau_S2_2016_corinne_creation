<?php

namespace CorinneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CorinneBundle\Entity\Objet;
use CorinneBundle\Form\ObjetType;

/**
 * Objet controller.
 *
 */
class ObjetController extends Controller
{
    /**
     * Lists all Objet entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $objets = $em->getRepository('CorinneBundle:Objet')->findAll();

        return $this->render('@Corinne/admin/objet/index.html.twig', array(
            'objets' => $objets,
        ));
    }

    /**
     * Creates a new Objet entity.
     *
     */
    public function newAction(Request $request)
    {
        $objet = new Objet();
        $form = $this->createForm('CorinneBundle\Form\ObjetType', $objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($objet);
            $em->flush();

            return $this->redirectToRoute('', array('id' => $objet->getId()));
        }

        return $this->render('objet/new.html.twig', array(
            'objet' => $objet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Objet entity.
     *
     */
    public function showAction(Objet $objet)
    {
        $deleteForm = $this->createDeleteForm($objet);

        return $this->render('objet/show.html.twig', array(
            'objet' => $objet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Objet entity.
     *
     */
    public function editAction(Request $request, Objet $objet)
    {
        $deleteForm = $this->createDeleteForm($objet);
        $editForm = $this->createForm('CorinneBundle\Form\ObjetType', $objet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($objet);
            $em->flush();

            return $this->redirectToRoute('objet_edit', array('id' => $objet->getId()));
        }

        return $this->render('objet/edit.html.twig', array(
            'objet' => $objet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Objet entity.
     *
     */
    public function deleteAction(Request $request, Objet $objet)
    {
        $form = $this->createDeleteForm($objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($objet);
            $em->flush();
        }

        return $this->redirectToRoute('objet_index');
    }

    /**
     * Creates a form to delete a Objet entity.
     *
     * @param Objet $objet The Objet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Objet $objet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('objet_delete', array('id' => $objet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
