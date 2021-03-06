<?php

namespace AppBundle\Repository;

/**
 * CourseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CourseRepository extends \Doctrine\ORM\EntityRepository
{
    private function addJoins(\Doctrine\ORM\QueryBuilder $qb) {
        $qb->leftJoin('c.provider', 'p')
            ->addSelect('p')
            ->leftJoin('c.serviceCategory', 'sc')
            ->addSelect('sc');
        return $qb;
    }
    public function myFindAll() {
        $qb = $this->createQueryBuilder('c');
        $query = $this->addJoins($qb);
        return $query->getQuery()->getResult();
    }
}
