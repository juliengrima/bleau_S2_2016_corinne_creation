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
            // $file stores the uploaded IMAGE file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $ecolabel->getSource();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('pictures_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $ecolabel->setSource($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($ecolabel);
            $em->flush();

            return $this->redirectToRoute('ecolabel_index', array('id' => $ecolabel->getId()));
        }

        return $this->render('@Corinne/admin/ecolabel/new.html.twig', array(
            'ecolabel' => $ecolabel,
            'form' => $form->createView(),
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
            $fileName = 'uploads/pictures/' . $ecolabel->getSource();
            if(file_exists($fileName)) {
                unlink($fileName);
            }


            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $ecolabel->getSource();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('pictures_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $ecolabel->setSource($fileName);


            $em = $this->getDoctrine()->getManager();
            $em->persist($ecolabel);
            $em->flush();

            return $this->redirectToRoute('ecolabel_index', array('id' => $ecolabel->getId()));
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

            $filename = 'uploads/pictures/' . $ecolabel->getSource();
            if(file_exists($filename)) {
                unlink($filename);
            }

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
