<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\ServiceCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Servicecategory controller.
 *
 * @Route("servicecategor")
 */
class ServiceCategoryController extends Controller
{
    /**
     * Lists all serviceCategory entities.
     *
     * @Route("ies/", name="servicecategory_index")
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


        return $this->render('frontEnd/servicecategories/index.html.twig', array('cities' => $cities, 'providers' => $providers, 'promotions' => $promotions,
            'courses' => $courses, 'service_categories' => $service_categories/*, 'sliders' => $slider*/));
    }

    /**
     * Finds and displays a serviceCategory entity.
     *
     * @Route("y/{id}", name="servicecategory_show")
     * @Method("GET")
     */
    public function showAction(ServiceCategory $serviceCategory)
    {
        return $this->render('frontEnd/servicecategories/show.html.twig', array(
            'serviceCategory' => $serviceCategory,
        ));
    }
}
