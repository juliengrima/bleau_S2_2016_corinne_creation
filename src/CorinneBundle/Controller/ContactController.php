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
    public function newAction(Request $request){

        $routeName = $this->container->get('request')->get('_route');
        $contact = $request->request->get('check');

//        var_dump($request->request->get('check')) .'\n';
//        var_dump($request->request->get('nom')) .'\n';
//        var_dump($request->request->get('prenom')) .'\n';
//        var_dump($request->request->get('tel')) .'\n';
//        var_dump($request->request->get('email')) .'\n';
//        var_dump($request->request->get('text')); die();


        if ( $contact == "on") {

//          ENREGISTREMENT DU CONTACT ET ENVOI DU MAIL
            $contact = new Contact();
            $contact->setNom ($request->request->get ('nom'));
            $contact->setPrenom ($request->request->get ('prenom'));
            $contact->setTel ($request->request->get ('tel'));
            $contact->setMail ($request->request->get ('mail'));
            $contact->setMail ($request->request->get ('text'));

                $em = $this->getDoctrine ()->getManager ();
                $em->persist ($contact);
                $em->flush ();

//               ENVOI DU MAIL
            $from = $this->getParameter('mailer_user');
//            $name = $request->request->get('nom');
//            $firstname = $request->request->get('prenom');
//            $mail = $request->request->get('mail');
//            $tel = $request->request->get('tel');
//            $msg = $request->request->get('text');
            $message = \Swift_Message::newInstance()
                ->setSubject('Contact Coriine Création')
                ->setFrom(array($from => 'corinne'))
                ->setTo($from)
                ->setBody(
                    $this->renderView(
                        '@Corinne/User/mailclient.html.twig',
                        array(
                            'nom' => $contact,
                            'prenom' => $contact,
                            'mail' => $contact,
                            'tel' => $contact,
                            'text' => $contact
                        )
                    ),
                    'text/html'
                );
            $message2 = \Swift_Message::newInstance()
                ->setSubject('Copie Contact Corinne Création')
                ->setFrom(array($from => 'corinne'))
                ->setTo($mail)
                ->setBody(
                    $this->renderView(
                        '@Corinne/User/mailcorinnecreation.html.twig',
                        array(
                            'nom' => $contact,
                            'prenom' => $contact,
                            'mail' => $contact,
                            'tel' => $contact,
                            'text' => $contact
                        )
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            $this->get('mailer')->send($message2);

            return $this->render('@Corinne/admin/contact/new.html.twig', array(
                'nom' => $contact,
                'prenom' => $contact,
                'tel' => $contact,
                'mail' => $contact,
            ));
        }
        else{
//            ENVOI DU MAIL


        }
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
