<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\ServiceCategories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Servicecategory controller.
 *
 * @Route("servicecategories")
 */
class ServiceCategoriesController extends Controller
{
    /**
     * Lists all serviceCategory entities.
     *
     * @Route("/", name="servicecategories_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $serviceCategories = $em->getRepository('AppBundle:ServiceCategories')->findAll();

        return $this->render('frontEnd/servicecategories/index.html.twig', array(
            'serviceCategories' => $serviceCategories,
        ));
    }

    /**
     * Finds and displays a serviceCategory entity.
     *
     * @Route("/{id}", name="servicecategories_show")
     * @Method("GET")
     */
    public function showAction(ServiceCategories $serviceCategory)
    {

        return $this->render('frontEnd/servicecategories/show.html.twig', array(
            'serviceCategory' => $serviceCategory,
        ));
    }
}
