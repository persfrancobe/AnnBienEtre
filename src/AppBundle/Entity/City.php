<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="cities")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CityRepository")
 */
class City
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
     * @ORM\OneToMany(targetEntity="User", mappedBy="city")
     */
    private $users;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Postcode", mappedBy="city")
     */
    private $postcodes;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Locality", mappedBy="city")
     */
    private $localities;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->localities = new ArrayCollection();
        $this->postcodes= new ArrayCollection();
    }

    public function __toString()
    {
        return $this->city;
    }

    /**
     * @return ArrayCollection
     */
    public function getLocalities()
    {
        return $this->localities;
    }

    /**
     * @param mixed $locality
     */
    public function addLocality(Locality $locality)
    {
        $this->localities->add($locality);
        // uncomment if you want to update other side
        //$localities->setCity($this);
    }

    /**
     * @param mixed $locality
     */
    public function removeLocality(Locality $locality)
    {
        $this->localities->removeElement($locality);
        // uncomment if you want to update other side
        //$localities->setCity(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getPostcodes()
    {
        return $this->postcodes;
    }

    /**
     * @param mixed $postcode
     */

    public function addPostcode(Postcode $postcode)
    {
        $this->postcodes->add($postcode);
        // uncomment if you want to update other side
        //$postalCodes->setCity($this);
    }

    /**
     * @param mixed $postcode
     */
    public function removePostcode(Postcode $postcode)
    {
        $this->postcodes->removeElement($postcode);
        // uncomment if you want to update other side
        //$postalCodes->setCity(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $user
     */
    public function addUser(User $user)
    {
        $this->users->add($user);
        // uncomment if you want to update other side
        //$users->setCity($this);
    }

    /**
     * @param mixed $user
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
        // uncomment if you want to update other side
        //$users->setCity(null);
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
     * @return City
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

