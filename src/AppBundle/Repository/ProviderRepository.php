<?php

namespace AppBundle\Repository;

/**
 * ProviderRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProviderRepository extends \Doctrine\ORM\EntityRepository
{

    public function myFindOne($id) {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('p.serviceCategories', 'cat')
            ->addSelect('cat');
        $query = $this->addJoins($qb);
        return $query->getQuery()->getSingleResult();
    }
    public function myFindAll() {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p')
            ->leftJoin('p.serviceCategories', 'cat')
            ->addSelect('cat');
        $query = $this->addJoins($qb);
        return $query->getQuery()->getResult();
    }
    public function findWithCity($city) {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p')
            ->where('p.city = :city')
            ->setParameter('city', $city)
            ->leftJoin('p.serviceCategories', 'cat')
            ->addSelect('cat');
        $query = $this->addJoins($qb);
        return $query->getQuery()->getResult();
    }
    public function findWithCategory($category) {
        $qb = $this->createQueryBuilder('p');
        $qb ->join('p.serviceCategories', 'c', 'WITH', 'c = :category')
            ->addSelect('c')
            ->setParameter('category', $category);
        $res = $qb->getQuery()->getResult();
        return $res;
    }
    public function findWithName($name) {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p')
            ->where($qb->expr()->like('p.username', $qb->expr()->literal('%' . $name . '%')))
            ->leftJoin('p.serviceCategories', 'cat')
            ->addSelect('cat');
        $query = $this->addJoins($qb);
        return $query->getQuery()->getResult();
    }
    public function findWithNameCategory($name, $category) {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p')
            ->where($qb->expr()->like('p.username', $qb->expr()->literal('%' . $name . '%')))
            ->leftJoin('p.serviceCategories', 'cat')
            ->addSelect('cat')
            ->andWhere('cat = :category')
            ->setParameter('category', $category);
        $query = $this->addJoins($qb);
        return $query->getQuery()->getResult();
    }
    public function findWithNameCity($name, $city) {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p')
            ->where($qb->expr()->like('p.username', $qb->expr()->literal('%' . $name . '%')))
            ->andWhere('p.city = :city')
            ->setParameter('city', $city)
            ->leftJoin('p.category', 'cat')
            ->addSelect('cat');
        $query = $this->addJoins($qb);
        return $query->getQuery()->getResult();
    }
    public function findWithCityCategory($city,$category) {
        $qb = $this->createQueryBuilder('p');
        $qb->Where('p.city = :city')
            ->setParameter('city', $city)
            ->join('p.serviceCategories', 'c', 'WITH', 'c = :category')
            ->addSelect('c')
            ->setParameter('category',$category);
        $query = $this->addJoins($qb);
        return $query->getQuery()->getResult();
    }
    public function findWithNameCityCategory($name, $city, $category) {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p')
            ->where($qb->expr()->like('p.username', $qb->expr()->literal('%' . $name . '%')))
            ->andWhere("p.city = :c")
            ->setParameter('c', $city)
            ->leftJoin('p.serviceCategories', 'cat')
            ->addSelect('cat')
            ->andWhere("cat = :cat")
            ->setParameter('cat', $category);
        $query = $this->addJoins($qb);
        return $query->getQuery()->getResult();
    }
    private function addJoins(\Doctrine\ORM\QueryBuilder $qb) {
        $qb->leftJoin('p.courses', 's')
            ->addSelect('s')
            ->leftJoin('p.promotions', 'promo')
            ->addSelect('promo')
            ->leftJoin('p.comments', 'comm')
            ->addSelect('comm')
            ->leftJoin('p.images', 'i')
            ->addSelect('i')
            ->leftJoin('p.notes', 'n')
            ->addSelect('n')
            ->leftJoin('p.favorites', 'f')
            ->addSelect('f');
        return $qb;
    }
    public function getByLocked() {
        $qb = $this->createQueryBuilder('u')
            ->where('u.locked = false');
        return $qb->getQuery()->getResult();
    }
    public function providerRating(){
        $qb=$this->createQueryBuilder('p');
        $qb->leftJoin('p.notes','n')
            ->select($qb->expr()->avg('n.note').' AS avg')
            ->addSelect('avg')
            ->addSelect($qb->expr()->count('n.note').' AS cnt')
            ->addSelect('cnt')
            ->groupBy('p')
            ->orderBy('avg','DESC')
            ->addOrderBy('cnt','DESC');
        return $qb->getQuery()->getResult();

    }

}
