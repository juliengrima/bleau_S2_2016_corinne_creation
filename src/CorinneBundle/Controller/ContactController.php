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

//        $routeName = $this->container->get('request')->get('_route');
        $check = $request->request->get('check');
        $text = $request->request->get('text');
        $mail = $request->request->get('email');

//        var_dump($request->request->get('check')) .'\n';
//        var_dump($request->request->get('nom')) .'\n';
//        var_dump($request->request->get('prenom')) .'\n';
//        var_dump($request->request->get('tel')) .'\n';
//        var_dump($request->request->get('email')) .'\n';
//        var_dump($request->request->get('text')); die();


        if ( $check == "on") {

//          ENREGISTREMENT DU CONTACT ET ENVOI DU MAIL
            $contact = new Contact();
            $contact->setNom ($request->request->get ('nom'));
            $contact->setPrenom ($request->request->get ('prenom'));
            $contact->setTel ($request->request->get ('tel'));
            $contact->setMail ($request->request->get ('email'));



                $em = $this->getDoctrine ()->getManager ();
                $em->persist ($contact);
                $em->flush ();

//               ENVOI DU MAIL
            $from = $this->getParameter('mailer_user');
            $message = \Swift_Message::newInstance()
                ->setSubject('Contact Corinne Création')
                ->setFrom(array($from => 'allard.corinne@laposte.net'))
                ->setTo($from)
                ->setBody(
                    $this->renderView(
                        '@Corinne/User/mailclient.html.twig',
                        array(
                            'nom' => $contact,
                            'prenom' => $contact,
                            'mail' => $contact,
                            'tel' => $contact,
                            'text' => $text
                        )
                    ),
                    'text/html'
                );
            $message2 = \Swift_Message::newInstance()
                ->setSubject('Copie Contact Corinne Création')
                ->setFrom(array($from => 'allard.corinne@laposte.net'))
                ->setTo($mail)
                ->setBody(
                    $this->renderView(
                        '@Corinne/User/mailcorinnecreation.html.twig',
                        array(
                            'nom' => $contact,
                            'prenom' => $contact,
                            'mail' => $contact,
                            'tel' => $contact,
                            'text' => $text
                        )
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            $this->get('mailer')->send($message2);

//            return $this->render('@Corinne/admin/contact/new.html.twig', array(
//                'nom' => $contact,
//                'prenom' => $contact,
//                'tel' => $contact,
//                'mail' => $contact,
//            ));
        }
        else {
//            ENVOI DU MAIL
            $from = $this->getParameter('mailer_user');
            $name = $request->request->get('nom');
            $firstname = $request->request->get('prenom');
            $mail = $request->request->get('email');
            $tel = $request->request->get('tel');
            $msg = $request->request->get('text');
            $message = \Swift_Message::newInstance()
                ->setSubject('Contact Coriine Création')
                ->setFrom(array($from => 'allard.corinne@laposte.net'))
                ->setTo($from)
                ->setBody(
                    $this->renderView(
                        '@Corinne/User/mailclient.html.twig',
                        array(
                            'nom' => $name,
                            'prenom' => $firstname,
                            'mail' => $mail,
                            'tel' => $tel,
                            'text' => $msg
                        )
                    ),
                    'text/html'
                );
            $message2 = \Swift_Message::newInstance()
                ->setSubject('Copie Contact Corinne Création')
                ->setFrom(array($from => 'allard.corinne@laposte.net'))
                ->setTo($mail)
                ->setBody(
                    $this->renderView(
                        '@Corinne/User/mailcorinnecreation.html.twig',
                        array(
                            'nom' => $name,
                            'prenom' => $firstname,
                            'mail' => $mail,
                            'tel' => $tel,
                            'text' => $msg
                        )
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            $this->get('mailer')->send($message2);

        }
        return $this->redirectToRoute('corinne_homepage');
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
}
