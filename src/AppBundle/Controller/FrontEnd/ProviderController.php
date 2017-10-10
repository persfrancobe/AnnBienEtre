<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Provider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Provider controller.
 *
 * @Route("provider")
 */
class ProviderController extends Controller
{
    /**
     * Lists all provider entities.
     *
     * @Route("s/", name="provider_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $providers = $em->getRepository('AppBundle:Provider')->findAll();

        return $this->render('frontEnd/providers/index.html.twig', array(
            'providers' => $providers,
        ));
    }

    /**
     * Finds and displays a provider entity.
     *
     * @Route("/{id}", name="provider_show")
     * @Method("GET")
     */
    public function showAction(Provider $provider)
    {

        return $this->render('frontEnd/providers/show.html.twig', array(
            'provider' => $provider,
        ));
    }
}
