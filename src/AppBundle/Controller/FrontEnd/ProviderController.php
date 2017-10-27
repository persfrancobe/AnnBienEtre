<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Provider;
use AppBundle\Form\ProviderSearchType;
use AppBundle\Form\ProviderType;
use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\Exception\BadMethodCallException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $providers = $em->getRepository('AppBundle:Provider')->myFindAll();
        /**
         * @var Paginator
         */
        $paginator=$this->get('knp_paginator');
        $providers_result=$paginator->paginate($providers,$request->query->getInt('page',1),5);

        return $this->render('frontEnd/providers/index.html.twig', array( 'providers_result' => $providers_result));
    }

    /**
     * Finds and displays a provider entity.
     *
     * @Route("/{id}", name="provider_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $provider=$em->getRepository('AppBundle:Provider')->myFindOne($id);
        return $this->render('frontEnd/providers/show.html.twig', array(
            'provider' => $provider,
        ));
    }



    public function providerWrapperCardAction(){
        $em = $this->getDoctrine()->getManager();
        $providers = $em->getRepository('AppBundle:Provider')->MyFindAll();

        return $this->render('partials/provider-wrapper-card.html.twig', array('providers' => $providers));
    }

}
