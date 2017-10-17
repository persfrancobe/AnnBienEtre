<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Course controller.
 *
 * @Route("course")
 */
class CourseController extends Controller
{
    /**
     * Lists all course entities.
     *
     * @Route("s/", name="course_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $providers = $em->getRepository('AppBundle:Provider')->findAll();
        $promotions = $em->getRepository('AppBundle:Promotion')->findAll();
        $courses = $em->getRepository('AppBundle:Course')->findAll();
        $cities = $em->getRepository('AppBundle:City')->findAll();
        $service_categories = $em->getRepository('AppBundle:ServiceCategory')->findAll();
        /* $slider = $em->getRepository('AppBundle:Images')->findBy(array('type' => 'slider'));*/


        return $this->render('frontEnd/courses/index.html.twig', array('cities' => $cities, 'providers' => $providers, 'promotions' => $promotions,
            'courses' => $courses, 'service_categories' => $service_categories/*, 'sliders' => $slider*/));
    }

    /**
     * Finds and displays a course entity.
     *
     * @Route("/{id}", name="course_show")
     * @Method("GET")
     */
    public function showAction(Course $course)
    {

        return $this->render('frontEnd/courses/show.html.twig', array(
            'course' => $course,
        ));
    }
}
