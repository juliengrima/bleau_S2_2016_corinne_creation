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

        return $this->render('@Corinne/admin/contact/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /**
     * Creates a new Contact entity.
     *
     */
    public function newAction(Request $request){
        $contact = new Contact();
        $form = $this->createForm('CorinneBundle\Form\ContactType', $contact);
        $form->handleRequest($request);

        var_dump($contact);

        if ($form->isSubmitted() && $form->isValid()) {

            var_dump($contact->getIsSave());
            if($contact->getIsSave() == 1) {

                $name = $contact->getNom() . ' ' . $contact->getPrenom();
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact Corinne Création')
                    ->setFrom('allard.corinne@laposte.net')
                    ->setTo($contact->getMail())
                    ->setBody(
                        $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                            'CorinneBundle:Emails:registration.html.twig', array('name' => $name)
                        ), 'text/html'
                    )
                    /*
                     * If you also want to include a plaintext version of the message
                      ->addPart(
                      $this->renderView(
                      'Emails/registration.txt.twig',
                      array('name' => $name)
                      ),
                      'text/plain'
                      )
                     */
                ;
                $this->get('mailer')->send($message);


                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();
            }

            return $this->redirectToRoute('corinne_homepage');
        }


        return $this->render('@Corinne/User/contact.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));
    }

    /**
     * Deletes a Contact entity.
     *
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('CorinneBundle:Contact')->findOneById($id);

        $em->remove($contact);
        $em->flush();

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

    public function sendAction() {
        $name = "Madame Monsieur";

        $message = \Swift_Message::newInstance()
            ->setSubject('Contact Corinne Créations')
            ->setFrom('allard.corinne@laposte.net')
            ->setTo('allard.corinne@laposte.net')
            ->setBody(
                $this->renderView(
                // CorinneBundle/Resources/views/Emails/registration.html.twig
                    'CorinneBundle:Emails:client.html.twig', array('name' => $name)
                ), 'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
              ->addPart(
              $this->renderView(
              'Emails/registration.txt.twig',
              array('name' => $name)
              ),
              'text/plain'
              )
             */
        ;
        $this->get('mailer')->send($message);

        return $this->render('CorinneBundle:User:contact.html.twig');
    }
}
