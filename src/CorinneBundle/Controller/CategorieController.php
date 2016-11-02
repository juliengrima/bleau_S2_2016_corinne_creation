<?php

namespace CorinneBundle\Controller;

use CorinneBundle\CorinneBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CorinneBundle\Entity\Categorie;
use CorinneBundle\Form\CategorieType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Categorie controller.
 *
 */
class CategorieController extends Controller
{
    /**
     * Lists all Categorie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CorinneBundle:Categorie')->findAll();

        return $this->render('@Corinne/admin/categorie/index.html.twig', array(
            'categories' => $categories,
        ));
    }

    /**
     * Creates a new Categorie entity.
     *
     */
    public function newAction(Request $request)
    {
        $categorie = new Categorie();
        $form = $this->createForm('CorinneBundle\Form\CategorieType', $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $fileName = 'uploads/pictures/' . $categorie->getSource();
            if(file_exists($fileName)) {
                unlink($fileName);
            }


            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $categorie->getSource();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('pictures_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $categorie->setSource($fileName);


            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('categorie_index');
        }

        return $this->render('@Corinne/admin/categorie/new.html.twig', array(
            'categorie' => $categorie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Categorie entity.
     *
     */
    public function editAction(Request $request, Categorie $categorie)
    {
        $editForm = $this->createForm('CorinneBundle\Form\CategorieType', $categorie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $fileName = 'uploads/pictures/' . $categorie->getSource();
            if(file_exists($fileName)) {
                unlink($fileName);
            }


            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $categorie->getSource();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('pictures_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $categorie->setSource($fileName);


            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('categorie_index');
        }

        return $this->render('@Corinne/admin/categorie/edit.html.twig', array(
            'categorie' => $categorie,
            'edit_form' => $editForm->createView(),
        ));
    }

    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $categ = $em->getRepository('CorinneBundle:Categorie')->findOneById($id);
        $fileName = 'uploads/pictures/' . $categ->getSource();
        if(file_exists($fileName)) {
            unlink($fileName);
        }
        $em->remove($categ);
        $em->flush();

        return $this->redirectToRoute('categorie_index');

    }

    public function listeAction($id) {
        $em = $this->getDoctrine()->getManager();
        $objets = $em->getRepository('CorinneBundle:Objet')->findBy(array('sousCateg' => $id));

        foreach ($objets as $objet) {
            echo $objet->getDefinition() . '<br>';
        }
        return $this->render('CorinneBundle:User:liste.html.twig', array(
            'objets' => $objets
        ));
    }
}
