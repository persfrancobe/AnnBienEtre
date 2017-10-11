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
        $promotions = $em->getRepository('AppBundle:Promotion')->findAll();
        $courses = $em->getRepository('AppBundle:Course')->findAll();
        $cities = $em->getRepository('AppBundle:City')->findAll();
        $service_categories = $em->getRepository('AppBundle:ServiceCategory')->findAll();
        /* $slider = $em->getRepository('AppBundle:Images')->findBy(array('type' => 'slider'));*/


        return $this->render('frontEnd/providers/index.html.twig', array('cities' => $cities, 'providers' => $providers, 'promotions' => $promotions,
            'courses' => $courses, 'service_categories' => $service_categories/*, 'sliders' => $slider*/));
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
