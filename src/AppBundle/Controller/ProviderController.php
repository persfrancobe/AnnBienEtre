<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Provider;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Provider controller.
 *
 * @Route("prov")
 */
class ProviderController extends Controller
{
    /**
     * Lists all provider entities.
     *
     * @Route("/", name="prov_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $providers = $em->getRepository('AppBundle:Provider')->findAll();

        return $this->render('provider/index.html.twig', array(
            'providers' => $providers,
        ));
    }

    /**
     * Creates a new provider entity.
     *
     * @Route("/new", name="prov_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $provider = new Provider();
        $form = $this->createForm('AppBundle\Form\ProviderType', $provider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($provider);
            $em->flush();

            return $this->redirectToRoute('prov_show', array('id' => $provider->getId()));
        }

        return $this->render('provider/new.html.twig', array(
            'provider' => $provider,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a provider entity.
     *
     * @Route("/{id}", name="prov_show")
     * @Method("GET")
     */
    public function showAction(Provider $provider)
    {
        $deleteForm = $this->createDeleteForm($provider);

        return $this->render('provider/show.html.twig', array(
            'provider' => $provider,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing provider entity.
     *
     * @Route("/{id}/edit", name="prov_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Provider $provider)
    {
        $deleteForm = $this->createDeleteForm($provider);
        $editForm = $this->createForm('AppBundle\Form\ProviderType', $provider);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prov_edit', array('id' => $provider->getId()));
        }

        return $this->render('provider/edit.html.twig', array(
            'provider' => $provider,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a provider entity.
     *
     * @Route("/{id}", name="prov_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Provider $provider)
    {
        $form = $this->createDeleteForm($provider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($provider);
            $em->flush();
        }

        return $this->redirectToRoute('prov_index');
    }

    /**
     * Creates a form to delete a provider entity.
     *
     * @param Provider $provider The provider entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Provider $provider)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prov_delete', array('id' => $provider->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
