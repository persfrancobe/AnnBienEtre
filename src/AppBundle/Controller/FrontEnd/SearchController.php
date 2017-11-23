<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Provider;
use AppBundle\Form\CategorySearchType;
use AppBundle\Form\ProviderSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\Paginator;

/**
 * Provider controller.
 *
 * @Route("search")
 */
class SearchController extends Controller
{

    public function searchProviderAction()
    {
        $form=$this->createForm(ProviderSearchType::class);
        return $this->render('frontEnd/providers/search-widget.html.twig',array('form'=>$form->createView()));
    }

    /**
     * provider search result
     * @Method("GET")
     * @Route("/providerResult", name="search_provider_result")
     */
    public function searchProviderResultAction(Request $request) {

        $data=$request->query->get('provider_search');
        $prov=$this->get('AppBundle\Services\Search')->providersSearch($data['name'],$data['category'],$data['city']);

        /**
         * @var Paginator
         */
        $paginator=$this->get('knp_paginator');
        $providers_result=$paginator->paginate($prov,$request->query->getInt('page',1),5);

        return $this->render('frontEnd/providers/index.html.twig', array( 'providers_result' => $providers_result));

    }

    public function searchCategoryAction()
    {
        $form=$this->createForm(CategorySearchType::class);
        return $this->render(':frontEnd/servicecategories:search.html.twig',array('form'=>$form->createView()));
    }

    /**
     * category search result
     * @Method("GET")
     * @Route("/categoryResult", name="search_category_result")
     */
    public function searchCategoryResultAction(Request $request) {

        $data=$request->query->get('category_search');
        $sercat=$this->get('AppBundle\Services\Search')->categorySearch($data['name'],$data['provider']);

        /* $slider = $em->getRepository('AppBundle:Images')->findBy(array('type' => 'slider'));*/

        /**
         * @var Paginator
         */
        $paginator=$this->get('knp_paginator');
        $service_categories=$paginator->paginate($sercat,$request->query->getInt('page',1),12);


        return $this->render('frontEnd/servicecategories/index.html.twig', array('service_categories' => $service_categories));

    }
}