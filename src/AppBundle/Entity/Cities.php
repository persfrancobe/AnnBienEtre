<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cities
 *
 * @ORM\Table(name="cities")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CitiesRepository")
 */
class Cities
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Users", mappedBy="cities")
     */
    private $user;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Postcodes", mappedBy="cities")
     */
    private $postcode;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Localities", mappedBy="cities")
     */
    private $locality;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->locality = new ArrayCollection();
        $this->postcode= new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param mixed $locality
     */
    public function addLocality(Localities $locality)
    {
        $this->locality->add($locality);
        // uncomment if you want to update other side
        //$locality->setCity($this);
    }

    /**
     * @param mixed $locality
     */
    public function removeLocality(Localities $locality)
    {
        $this->locality->removeElement($locality);
        // uncomment if you want to update other side
        //$locality->setCity(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */

    public function addPostcode(Postcodes $postcode)
    {
        $this->postcode->add($postcode);
        // uncomment if you want to update other side
        //$postalCode->setCity($this);
    }

    /**
     * @param mixed $postcode
     */
    public function removePostcode(Postcodes $postcode)
    {
        $this->postcode->removeElement($postcode);
        // uncomment if you want to update other side
        //$postalCode->setCity(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function addUser(Users $user)
    {
        $this->user->add($user);
        // uncomment if you want to update other side
        //$user->setCity($this);
    }

    /**
     * @param mixed $user
     */
    public function removeUser(Users $user)
    {
        $this->user->removeElement($user);
        // uncomment if you want to update other side
        //$user->setCity(null);
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Cities
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
}

