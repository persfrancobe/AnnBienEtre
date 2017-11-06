<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Visitor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Visitor controller.
 *
 * @Route("visitor")
 */
class VisitorController extends Controller
{
    /**
     * Lists all visitor entities.
     *
     * @Route("/", name="visitor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $visitors = $em->getRepository('AppBundle:Visitor')->findAll();

        return $this->render('visitor/index.html.twig', array(
            'visitors' => $visitors,
        ));
    }

    /**
     * Creates a new visitor entity.
     *
     * @Route("/new", name="visitor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $visitor = new Visitor();
        $form = $this->createForm('AppBundle\Form\VisitorType', $visitor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($visitor);
            $em->flush();

            return $this->redirectToRoute('visitor_show', array('id' => $visitor->getId()));
        }

        return $this->render('visitor/new.html.twig', array(
            'visitor' => $visitor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a visitor entity.
     *
     * @Route("/{id}", name="visitor_show")
     * @Method("GET")
     */
    public function showAction(Visitor $visitor)
    {
        $deleteForm = $this->createDeleteForm($visitor);

        return $this->render('visitor/show.html.twig', array(
            'visitor' => $visitor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing visitor entity.
     *
     * @Route("/{id}/edit", name="visitor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Visitor $visitor)
    {
        $deleteForm = $this->createDeleteForm($visitor);
        $editForm = $this->createForm('AppBundle\Form\VisitorType', $visitor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('visitor_edit', array('id' => $visitor->getId()));
        }

        return $this->render('visitor/edit.html.twig', array(
            'visitor' => $visitor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a visitor entity.
     *
     * @Route("/{id}", name="visitor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Visitor $visitor)
    {
        $form = $this->createDeleteForm($visitor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($visitor);
            $em->flush();
        }

        return $this->redirectToRoute('visitor_index');
    }

    /**
     * Creates a form to delete a visitor entity.
     *
     * @param Visitor $visitor The visitor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Visitor $visitor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('visitor_delete', array('id' => $visitor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
