<?php

namespace CorinneBundle\Controller;

use CorinneBundle\CorinneBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CorinneBundle\Entity\Categorie;
use CorinneBundle\Form\CategorieType;
use Symfony\Component\HttpFoundation\Response;
use Imagick;
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

//        foreach ($categories as $element) {

//            $element['picture_min'] = '42';
//            var_dump($element);


//            header('Content-type: image/jpeg');

//            $image = new \Imagick('uploads/pictures/' . $element->getSource());
//            $image = new \Imagick('uploads/pictures/c1d13bee49265dad8508c9466f7c6f46.jpeg' );
// Si 0 est fourni comme paramètre de hauteur ou de largeur,
// les proportions seront conservées
//            $image->thumbnailImage(100, 0);

//            echo $image;
//        }

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

            return $this->redirectToRoute('categorie_show', array('id' => $categorie->getId()));
        }

        return $this->render('@Corinne/admin/categorie/new.html.twig', array(
            'categorie' => $categorie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Categorie entity.
     *
     */
    public function showAction(Categorie $categorie)
    {
        $deleteForm = $this->createDeleteForm($categorie);

        return $this->render('@Corinne/admin/categorie/show.html.twig', array(
            'categorie' => $categorie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Categorie entity.
     *
     */
    public function editAction(Request $request, Categorie $categorie)
    {
        $deleteForm = $this->createDeleteForm($categorie);
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

            return $this->redirectToRoute('categorie_edit', array('id' => $categorie->getId()));
        }

        return $this->render('@Corinne/admin/categorie/edit.html.twig', array(
            'categorie' => $categorie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Categorie entity.
     *
     */
    public function deleteAction(Request $request, Categorie $categorie)
    {
        $form = $this->createDeleteForm($categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorie);
            $em->flush();
            $fileName = 'uploads/pictures/' . $categorie->getSource();
            if(file_exists($fileName)) {
                unlink($fileName);
            }

        }

        return $this->redirectToRoute('categorie_index');
    }

    /**
     * Creates a form to delete a Categorie entity.
     *
     * @param Categorie $categorie The Categorie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Categorie $categorie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorie_delete', array('id' => $categorie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function listeAction($id) {
        $em = $this->getDoctrine()->getManager();
        $objets = $em->getRepository('CorinneBundle:Objet')->findBy(array('sousCateg' => $id));

//        return $this->render('CorinneBundle:User:liste.html.twig', array(
//            'objets' => $objets
//        ));
//

        foreach ($objets as $objet) {

            // $advert est une instance de Advert

            echo $objet->getDefinition() . '<br>';
        }
//        return new Response("Affichage de la sous catégorie sousCat : ".$id);

        return $this->render('CorinneBundle:User:liste.html.twig', array(
            'objets' => $objets
        ));
    }
}
