<?php
namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;
class Search {
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;
    public function __construct(EntityManager $em) {
        $this->entityManager = $em;
    }
    public function providersSearch($name, $category, $city) {

        $res = null;

        if ($name !== null && $category !== null && $city !== null) {
            $res = $this->entityManager->getRepository('AppBundle:Provider')->findWithNameCityCategory($name, $city, $category);
        }
        if ($name !== null && $category !== null) {
            $res =  $this->entityManager->getRepository('AppBundle:Provider')->findWithNameCategory($name, $category);
        }
        if ($name !== null && $city !== null) {
            $res =  $this->entityManager->getRepository('AppBundle:Provider')->findWithNameCity($name, $city);
        }
        if ($category !== null && $city !== null) {

            $res =  $this->entityManager->getRepository('AppBundle:Provider')->findWithCityCategory($category, $city);
        }
        if ($name !== null) {

            $res =  $this->entityManager->getRepository('AppBundle:Provider')->findWithName($name);
        }
        if ($category !== null) {
            $res =  $this->entityManager->getRepository('AppBundle:Provider')->findWithCategory($category);
        }
        if ($city !== null) {
            $res =  $this->entityManager->getRepository('AppBundle:Provider')->findWithCity($city);
        } else {
            $res =  $this->entityManager->getRepository('AppBundle:Provider')->myFindAll();
        }

        return $res;
    }
    public function categoriesSearch($name) {
        if ($name != null) {
            $this->entityManager->getRepository('AppBundle:ServiceCategory')->findBy(array('name'=>$name));
        } else {
            $this->entityManager->getRepository('AppBundle:ServiceCategory')->findAll();
        }
    }
}