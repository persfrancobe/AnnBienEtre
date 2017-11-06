<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\Paginator;

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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $crs = $em->getRepository('AppBundle:Course')->MyfindAll();
        /**
         * @var Paginator
         */
        $paginator=$this->get('knp_paginator');
        $courses=$paginator->paginate($crs,$request->query->getInt('page',1),5);
        return $this->render('frontEnd/courses/index.html.twig', array('courses' => $courses));
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
