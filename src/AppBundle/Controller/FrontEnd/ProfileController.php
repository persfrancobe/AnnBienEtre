<?php

namespace AppBundle\Controller\FrontEnd;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Visitor controller.
 *
 * @Route("profile")
 */
class ProfileController extends Controller
{
    /**
     * Displays a form to edit an existing visitor entity.
     *
     * @Route("/visitor", name="profile_visitor")
     * @Method({"GET", "POST"})
     */
    public function visitorAction(Request $request)
    {
        $visitor=$this->get('security.token_storage')->getToken()->getUser();
        $editForm = $this->createForm('AppBundle\Form\VisitorProfileType', $visitor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile_visitor');
        }

        return $this->render('frontEnd/profile/visitor.html.twig', array(
            'visitor' => $visitor,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing visitor entity.
     *
     * @Route("/provider", name="profile_provider")
     * @Method({"GET", "POST"})
     */
    public function providerAction(Request $request)
    {
        $provider=$this->get('security.token_storage')->getToken()->getUser();
        $editForm = $this->createForm('AppBundle\Form\ProviderProfileType', $provider);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile_provider');
        }

        return $this->render(':frontEnd/profile:provider.html.twig', array(
            'provider' => $provider,
            'edit_form' => $editForm->createView(),
        ));
    }


}
