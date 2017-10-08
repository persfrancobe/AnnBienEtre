<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Courses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Course controller.
 *
 * @Route("courses")
 */
class CoursesController extends Controller
{
    /**
     * Lists all course entities.
     *
     * @Route("/", name="courses_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('AppBundle:Courses')->findAll();

        return $this->render('frontEnd/courses/index.html.twig', array(
            'courses' => $courses,
        ));
    }

    /**
     * Finds and displays a course entity.
     *
     * @Route("/{id}", name="courses_show")
     * @Method("GET")
     */
    public function showAction(Courses $course)
    {

        return $this->render('frontEnd/courses/show.html.twig', array(
            'course' => $course,
        ));
    }
}
