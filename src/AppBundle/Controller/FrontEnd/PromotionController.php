<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Promotion;
use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Promotion controller.
 *
 * @Route("promotion")
 */
class PromotionController extends Controller
{
    /**
     * Lists all promotion entities.
     *
     * @Route("s/", name="promotion_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $promotion = $em->getRepository('AppBundle:Promotion')->MyFindAll();
        /**
         * @var Paginator
         */
        $paginator=$this->get('knp_paginator');
        $promotions=$paginator->paginate($promotion,$request->query->getInt('page',1),5);

        return $this->render('frontEnd/promotions/index.html.twig', array( 'promotions' => $promotions));
    }

    /**
     * Finds and displays a promotion entity.
     *
     * @Route("/{id}", name="promotion_show")
     * @Method("GET")
     */
    public function showAction(Promotion $promotion)
    {

        return $this->render('frontEnd/promotions/show.html.twig', array(
            'promotion' => $promotion,
        ));
    }
}
