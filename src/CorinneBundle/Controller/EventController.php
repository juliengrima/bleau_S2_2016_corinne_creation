<?php

namespace CorinneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CorinneBundle\Entity\Event;
use CorinneBundle\Form\EventType;

/**
 * Event controller.
 *
 */
class EventController extends Controller
{
    /**
     * Lists all Event entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('CorinneBundle:Event')->findAll();

        return $this->render('@Corinne/admin/event/index.html.twig', array(
            'events' => $events,
        ));
    }


    /**
     * Creates a new Event entity.
     *
     */
    public function newAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('event_index', array('id' => $event->getId()));
        }
        ;


        return $this->render('@Corinne/admin/event/new.html.twig', array(
//        return $this->render('@Corinne/admin/event/test.html.twig', array(
            'event' => $event,
            'form' => $form->createView(),
        ));

    }

    /**
     * Displays a form to edit an existing Event entity.
     *
     */
    public function editAction(Request $request, Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);
        $editForm = $this->createForm('CorinneBundle\Form\EventType', $event);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('event_index', array('id' => $event->getId()));
        }

        return $this->render('@Corinne/admin/event/edit.html.twig', array(
            'event' => $event,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Event entity.
     *
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('CorinneBundle:Event')->findOneById($id);
        $fileName = 'uploads/imgp-event/' . $event->getSource();
        if(file_exists($fileName)) {
            unlink($fileName);
        }
        $em->remove($event);
        $em->flush();

        return $this->redirectToRoute('event_index');

    }

    /**
     * Creates a form to delete a Event entity.
     *
     * @param Event $event The Event entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Event $event)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('event_delete', array('id' => $event->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
