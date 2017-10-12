<?php

namespace AccesBundles\UploaderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UploaderBundle:Default:index.html.twig');
    }
}
