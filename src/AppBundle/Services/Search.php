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

        switch (true){
            case ($name !=='' &&  $city !== '' && $category !== '' ):
                $res=$this->entityManager->getRepository('AppBundle:Provider')->findWithNameCityCategory($name,$city,$category);
                break;
            case ($name !=='' && $city !== ''):
                $res=$this->entityManager->getRepository('AppBundle:Provider')->findWithNameCity($name,$city);
                break;
            case ( $city !== '' && $category !== '' ):
                $res=$this->entityManager->getRepository('AppBundle:Provider')->findWithCityCategory($city,$category);
                break;
            case $name !=='':
                $res=$this->entityManager->getRepository('AppBundle:Provider')->findWithName($name);
                break;
            case $city!=='':
                $res=$this->entityManager->getRepository('AppBundle:Provider')->findWithCity($city);
                break;
            case $category!=='':
                $res=$this->entityManager->getRepository('AppBundle:Provider')->findWithCategory($category);
                break;
            default:
                $res=$this->entityManager->getRepository('AppBundle:Provider')->myFindAll();
        }

        return $res;
    }
}