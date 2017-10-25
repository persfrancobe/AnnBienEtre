<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Provider;
use AppBundle\Form\ProviderSearchType;
use AppBundle\Form\ProviderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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
        return $this->render(':Partials:provider-search-widget.html.twig',array('form'=>$form->createView()));
    }

    /**
     * provider search result
     * @Method("GET")
     * @Route("/providerResult", name="search_provider_result")
     */
    public function searchProviderResultAction(Request $request) {

        $data=$request->query->get('provider_search');
        $providers_result=$this->get('AppBundle\Services\Search')->providersSearch($data['name'],$data['category'],$data['city']);

        return $this->render('frontEnd/providers/index.html.twig', array('providers_result' => $providers_result));

    }
}