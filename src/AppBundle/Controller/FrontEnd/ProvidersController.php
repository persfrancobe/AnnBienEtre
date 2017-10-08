<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Providers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Provider controller.
 *
 * @Route("providers")
 */
class ProvidersController extends Controller
{
    /**
     * Lists all provider entities.
     *
     * @Route("/", name="providers_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $providers = $em->getRepository('AppBundle:Providers')->findAll();

        return $this->render('frontEnd/providers/index.html.twig', array(
            'providers' => $providers,
        ));
    }

    /**
     * Finds and displays a provider entity.
     *
     * @Route("/{id}", name="providers_show")
     * @Method("GET")
     */
    public function showAction(Providers $provider)
    {

        return $this->render('frontEnd/providers/show.html.twig', array(
            'provider' => $provider,
        ));
    }
}
