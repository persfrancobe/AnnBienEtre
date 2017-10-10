<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $promotions = $em->getRepository('AppBundle:Promotion')->findAll();

        return $this->render('frontEnd/promotions/index.html.twig', array(
            'promotions' => $promotions,
        ));
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
