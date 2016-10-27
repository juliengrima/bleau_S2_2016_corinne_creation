<?php

namespace CorinneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CorinneBundle\Entity\Ecolabel;
use CorinneBundle\Form\EcolabelType;

/**
 * Ecolabel controller.
 *
 */
class EcolabelController extends Controller
{
    /**
     * Lists all Ecolabel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecolabels = $em->getRepository('CorinneBundle:Ecolabel')->findAll();

        return $this->render('@Corinne/admin/ecolabel/index.html.twig', array(
            'ecolabels' => $ecolabels,
        ));
    }

    /**
     * Creates a new Ecolabel entity.
     *
     */
    public function newAction(Request $request)
    {
        $ecolabel = new Ecolabel();
        $form = $this->createForm(EcolabelType::class, $ecolabel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($ecolabel);
            $em->flush();

            return $this->redirectToRoute('ecolabel_show', array('id' => $ecolabel->getId()));
        }

        return $this->render('@Corinne/admin/ecolabel/new.html.twig', array(
            'ecolabel' => $ecolabel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ecolabel entity.
     *
     */
    public function showAction(Ecolabel $ecolabel)
    {
        $deleteForm = $this->createDeleteForm($ecolabel);

        return $this->render('@Corinne/admin/ecolabel/show.html.twig', array(
            'ecolabel' => $ecolabel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ecolabel entity.
     *
     */
    public function editAction(Request $request, Ecolabel $ecolabel)
    {
        $deleteForm = $this->createDeleteForm($ecolabel);
        $editForm = $this->createForm('CorinneBundle\Form\EcolabelType', $ecolabel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $ecolabel->preUpload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecolabel);
            $em->flush();

            return $this->redirectToRoute('ecolabel_show', array('id' => $ecolabel->getId()));
        }

        return $this->render('@Corinne/admin/ecolabel/edit.html.twig', array(
            'ecolabel' => $ecolabel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ecolabel entity.
     *
     */
    public function deleteAction(Request $request, Ecolabel $ecolabel)
    {
        $form = $this->createDeleteForm($ecolabel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecolabel);
            $em->flush();
        }

        return $this->redirectToRoute('ecolabel_index');
    }

    /**
     * Creates a form to delete a Ecolabel entity.
     *
     * @param Ecolabel $ecolabel The Ecolabel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ecolabel $ecolabel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecolabel_delete', array('id' => $ecolabel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
