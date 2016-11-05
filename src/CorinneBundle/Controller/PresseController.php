<?php

namespace CorinneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CorinneBundle\Entity\Presse;
use CorinneBundle\Form\PresseType;

/**
 * Presse controller.
 *
 */
class PresseController extends Controller
{
    /**
     * Lists all Presse entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presses = $em->getRepository('CorinneBundle:Presse')->findAll();

        return $this->render('@Corinne/admin/presse/index.html.twig', array(
            'presses' => $presses,
        ));
    }

    /**
     * Creates a new Presse entity.
     *
     */
    public function newAction(Request $request)
    {
        $presse = new Presse();
        $form = $this->createForm(PresseType::class, $presse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($presse);
            $em->flush();

            return $this->redirectToRoute('presse_index', array('id' => $presse->getId()));
        }

        return $this->render('@Corinne/admin/presse/new.html.twig', array(
            'presse' => $presse,
            'form' => $form->createView(),
        ));

    }

    /**
     * Displays a form to edit an existing Presse entity.
     *
     */
    public function editAction(Request $request, Presse $presse)
    {
        $deleteForm = $this->createDeleteForm($presse);
        $editForm = $this->createForm('CorinneBundle\Form\PresseType', $presse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($presse);
            $em->flush();

            return $this->redirectToRoute('presse_index', array('id' => $presse->getId()));
        }

        return $this->render('@Corinne/admin/presse/edit.html.twig', array(
            'presse' => $presse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Presse entity.
     *
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $presse = $em->getRepository('CorinneBundle:Presse')->findOneById($id);
        $fileName = 'uploads/pictures/' . $presse->getSource();
        if(file_exists($fileName)) {
            unlink($fileName);
        }
        $em->remove($presse);
        $em->flush();

        return $this->redirectToRoute('presse_index');

    }

    /**
     * Creates a form to delete a Presse entity.
     *
     * @param Presse $presse The Presse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Presse $presse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presse_delete', array('id' => $presse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
