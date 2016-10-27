<?php

namespace CorinneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CorinneBundle\Entity\Contact;
use CorinneBundle\Form\ContactType;

/**
 * Contact controller.
 *
 */
class ContactController extends Controller
{
    /**
     * Lists all Contact entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('CorinneBundle:Contact')->findAll();

        return $this->render('contact/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /**
     * Creates a new Contact entity.
     *
     */
    public function newAction(Request $request)
    {
        $request = $this->container->get('request');
        $routeName = $request->get('_route');
//        var_dump($routeName); die();
//        var_dump($request->request->get('check')); die();
//          var_dump($request); die();

        if (null !== $request->request->get('check')) {

//            ENREGISTREMENT DU CONTACT ET ENVOI DU MAIL
            if ($form->isSubmitted () && $form->isValid ()) {

                $contact = new Contact();
                $contact->setNom ($request->request->get ('nom'));
                $contact->setPrenom ($request->request->get ('prenom'));
                $contact->settel ($request->request->get ('tel'));
                $contact->setMail ($request->request->get ('mail'));

                $em = $this->getDoctrine ()->getManager ();
                $em->persist ($contact);
                $em->flush ();

//                ENVOI DU MAIL



            }
        }
        else {
//            ENVOI DU MAIL


        }


//                return $this->redirectToRoute('contact_show', array('id' => $contact->getId()));
//            }
//
//            return $this->render('@Corinne/admin/contact/new.html.twig', array(
//                'contact' => $contact,
////            'form' => $form->createView(),
//            ));
//        }
//        else{
////            ENVOI DU MAIL
//        }
        return $this->redirectToRoute($routeName);

    }

    /**
     * Finds and displays a Contact entity.
     *
     */
    public function showAction(Contact $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);

        return $this->render('contact/show.html.twig', array(
            'contact' => $contact,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Contact entity.
     *
     */
    public function editAction(Request $request, Contact $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);
        $editForm = $this->createForm('CorinneBundle\Form\ContactType', $contact);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contact_edit', array('id' => $contact->getId()));
        }

        return $this->render('contact/edit.html.twig', array(
            'contact' => $contact,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contact entity.
     *
     */
    public function deleteAction(Request $request, Contact $contact)
    {
        $form = $this->createDeleteForm($contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contact);
            $em->flush();
        }

        return $this->redirectToRoute('contact_index');
    }

    /**
     * Creates a form to delete a Contact entity.
     *
     * @param Contact $contact The Contact entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contact $contact)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contact_delete', array('id' => $contact->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
