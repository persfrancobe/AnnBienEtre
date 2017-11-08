<?php

namespace AppBundle\Controller\Profile;

use AppBundle\Entity\Visitor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Visitor controller.
 *
 * @Route("profile/visitor")
 */
class ProfileVisitorController extends Controller
{
    /**
     * Displays a form to edit an existing visitor entity.
     *
     * @Route("/edit", name="profile_visitor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
        $visitor=$this->get('security.token_storage')->getToken()->getUser();
        $editForm = $this->createForm('AppBundle\Form\VisitorProfileType', $visitor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile_visitor_edit');
        }

        return $this->render('profile/visitor/edit.html.twig', array(
            'visitor' => $visitor,
            'edit_form' => $editForm->createView(),
        ));
    }


}
