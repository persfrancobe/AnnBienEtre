<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Provider;
use AppBundle\Form\ProviderSearchType;
use AppBundle\Form\ProviderType;
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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $providers = $em->getRepository('AppBundle:Provider')->myFindAll();
        $providers_result = $em->getRepository('AppBundle:Provider')->myFindAll();
        $promotions = $em->getRepository('AppBundle:Promotion')->findAll();
        $courses = $em->getRepository('AppBundle:Course')->findAll();
        $cities = $em->getRepository('AppBundle:City')->findAll();
        $service_categories = $em->getRepository('AppBundle:ServiceCategory')->findAll();
        /* $slider = $em->getRepository('AppBundle:Images')->findBy(array('type' => 'slider'));*/


        return $this->render('frontEnd/providers/index.html.twig', array('cities' => $cities, 'providers' => $providers, 'promotions' => $promotions,
            'courses' => $courses, 'service_categories' => $service_categories, 'providers_result' => $providers_result));
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
        $provider=$em->getRepository('AppBundle:Provider')->findProvCategCourPromoComment($id);
        return $this->render('frontEnd/providers/show.html.twig', array(
            'provider' => $provider,
        ));
    }

    /**
     * Search a provider entity.
     *
     * @Route("/serche", name="provider_search")
     * @Method("GET")
     */
    public function searchAction()
    {
        $form=$this->createForm(ProviderSearchType::class);
        return $this->render(':Partials:searchWidget.html.twig',array('form'=>$form->createView()));
    }

    /**
     * search handeling
     * @Method("POST")
     * @Route("/searchHandel", name="search_handeling")
     */
    public function searchHandelingAction(Request $request) {
        $form=$this->createForm(ProviderSearchType::class);
        if($request->getMethod()=="POST"){
            $form->handleRequest($request);
            if($form->isSubmitted()&&$form->isValid()){

                $data=$form->getData();

                $providers_result=$this->get('AppBundle\Services\Search')->providersSearch($data['name'],$data['category'],$data['city']);
            }else{
                throw new \Symfony\Component\Form\Exception\BadMethodCallException('not valide or submited');
            }
        }
        else{
            throw new \Symfony\Component\Validator\Exception\BadMethodCallException('accept only by post method');
        }
        $em=$this->getDoctrine()->getManager();
        $promotions = $em->getRepository('AppBundle:Promotion')->findAll();
        $providers = $em->getRepository('AppBundle:Provider')->findAll();
        $courses = $em->getRepository('AppBundle:Course')->findAll();
        $cities = $em->getRepository('AppBundle:City')->findAll();
        $service_categories = $em->getRepository('AppBundle:ServiceCategory')->findAll();
        /* $slider = $em->getRepository('AppBundle:Images')->findBy(array('type' => 'slider'));*/


        return $this->render('frontEnd/providers/index.html.twig', array('cities' => $cities, 'providers' => $providers, 'promotions' => $promotions,
            'courses' => $courses, 'service_categories' => $service_categories, 'providers_result' => $providers_result));

    }


}
