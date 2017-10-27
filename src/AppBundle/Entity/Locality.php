<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Locality
 *
 * @ORM\Table(name="localities")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocalityRepository")
 */
class Locality

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
     * @ORM\OneToMany(targetEntity="User", mappedBy="locality")
     */
    private $users;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Postcode", mappedBy="locality")
     */
    private $postcodes;

    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="localities")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected  $city;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->postcodes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->locality;
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
    public function setCity(City $city)
    {
        $this->city = $city;
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
    public function addPostcode (Postcode $postcode)
    {
        $this->postcodes->add($postcode);
        // uncomment if you want to update other side
        //$postalCodes->setLocality($this);
    }

    /**
     * @param mixed $postcode
     */
    public function removePostcode (Postcode $postcode)
    {
        $this->postcodes->removeElement($postcode);
        // uncomment if you want to update other side
        //$postalCodes->setLocality(null);
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
        //$users->setLocality($this);
    }

    /**
     * @param mixed $user
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
        // uncomment if you want to update other side
        //$users->setLocality(null);
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
     * @return Locality
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

