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
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $objet->getSource();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('pictures_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $objet->setSource($fileName);



            $em = $this->getDoctrine()->getManager();
            $em->persist($objet);
            $em->flush();

            return $this->redirectToRoute('objet_index', array('id' => $objet->getId()));
        }

        return $this->render('@Corinne/admin/objet/new.html.twig', array(
            'objet' => $objet,
            'form' => $form->createView(),
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

            $fileName = 'uploads/pictures/' . $objet->getSource();
            if(file_exists($fileName)) {
                unlink($fileName);
            }


            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $objet->getSource();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('pictures_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $objet->setSource($fileName);
            $objet->setCateg($objet->getSousCateg()->getCategorie());

            $em = $this->getDoctrine()->getManager();
            $em->persist($objet);
            $em->flush();

            return $this->redirectToRoute('objet_index', array('id' => $objet->getId()));
        }

        return $this->render('@Corinne/admin/objet/edit.html.twig', array(
            'objet' => $objet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Objet entity.
     *
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $objet = $em->getRepository('CorinneBundle:Objet')->findOneById($id);
        $fileName = 'uploads/pictures/' . $objet->getSource();
        if(file_exists($fileName)) {
            unlink($fileName);
        }
        $em->remove($objet);
        $em->flush();

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
