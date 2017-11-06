<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\ServiceCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Knp\Component\Pager\Paginator;
use Symfony\Component\HttpFoundation\Request;

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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $sercat = $em->getRepository('AppBundle:ServiceCategory')->myFindAll();
        /* $slider = $em->getRepository('AppBundle:Images')->findBy(array('type' => 'slider'));*/

        /**
         * @var Paginator
         */
        $paginator=$this->get('knp_paginator');
        $service_categories=$paginator->paginate($sercat,$request->query->getInt('page',1),12);


        return $this->render('frontEnd/servicecategories/index.html.twig', array('service_categories' => $service_categories));
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
