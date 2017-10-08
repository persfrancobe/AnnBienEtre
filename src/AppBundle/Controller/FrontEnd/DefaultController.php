<?php

namespace AppBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homePageAction() {
        $em = $this->getDoctrine()->getManager();

        $providers = $em->getRepository('AppBundle:Providers')->findAll();
        $promotions = $em->getRepository('AppBundle:Promotions')->findAll();
        $courses = $em->getRepository('AppBundle:Courses')->findAll();
        $cities = $em->getRepository('AppBundle:Cities')->findAll();
        $service_categories = $em->getRepository('AppBundle:ServiceCategories')->findAll();
       /* $slider = $em->getRepository('AppBundle:Images')->findBy(array('type' => 'slider'));*/


        return $this->render('frontEnd/default/index.html.twig', array('cities' => $cities, 'providers' => $providers, 'promotions' => $promotions,
            'courses' => $courses, 'service_categories' => $service_categories/*, 'sliders' => $slider*/));
    }
}
