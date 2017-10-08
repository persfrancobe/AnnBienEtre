<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Promotions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Promotion controller.
 *
 * @Route("promotions")
 */
class PromotionsController extends Controller
{
    /**
     * Lists all promotion entities.
     *
     * @Route("/", name="promotions_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $promotions = $em->getRepository('AppBundle:Promotions')->findAll();

        return $this->render('frontEnd/promotions/index.html.twig', array(
            'promotions' => $promotions,
        ));
    }

    /**
     * Finds and displays a promotion entity.
     *
     * @Route("/{id}", name="promotions_show")
     * @Method("GET")
     */
    public function showAction(Promotions $promotion)
    {

        return $this->render('frontEnd/promotions/show.html.twig', array(
            'promotion' => $promotion,
        ));
    }
}
