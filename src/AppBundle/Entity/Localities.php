<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Localities
 *
 * @ORM\Table(name="localities")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocalitiesRepository")
 */
class Localities
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
     * @ORM\Column(name="locality", type="string", length=255)
     */
    private $locality;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Users", mappedBy="localities")
     */
    private $user;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Postcodes", mappedBy="localities")
     */
    private $postcode;

    /**
     * @ORM\ManyToOne(targetEntity="Cities", inversedBy="localities")
     */
    protected  $city;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->postcode=new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity(Cities $city)
    {
        $this->city = $city;
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
    public function addPostalCode(Postcodes $postcode)
    {
        $this->postcode->add($postcode);
        // uncomment if you want to update other side
        //$postalCode->setLocality($this);
    }

    /**
     * @param mixed $postcode
     */
    public function removePostalCode(Postcodes $postcode)
    {
        $this->postcode->removeElement($postcode);
        // uncomment if you want to update other side
        //$postalCode->setLocality(null);
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
        //$user->setLocality($this);
    }

    /**
     * @param mixed $user
     */
    public function removeUser(Users $user)
    {
        $this->user->removeElement($user);
        // uncomment if you want to update other side
        //$user->setLocality(null);
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
     * Set locality
     *
     * @param string $locality
     *
     * @return Localities
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }
}

