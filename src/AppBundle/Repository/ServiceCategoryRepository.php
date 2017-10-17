<?php

namespace AppBundle\Repository;

/**
 * ServiceCategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ServiceCategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function findOneJointCourses($id){
        $qb=$this->createQueryBuilder('sc');
        $query=$qb->where('sc.id=:id')
                    ->setParameter(':id',$id)
                    ->leftJoin('sc.providers','p')
                    ->leftJoin('p.promotions','pp')
                    ->leftJoin('p.images','i')
                    ->leftJoin('p.courses','pc')
                    ->addSelect('p','pp','pc','i')
                    ->getQuery();
        return $query->getResult();

    }
}