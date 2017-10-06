<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Postcodes
 *
 * @ORM\Table(name="postcodes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostcodesRepository")
 */
class Postcodes
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
     * @ORM\Column(name="postcode", type="string", length=255)
     */
    private $postcode;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Users", mappedBy="postcodes")
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="Localities", inversedBy="postcodes")
     */
    private  $locality;

    /**
     * @ORM\ManyToOne(targetEntity="Cities", inversedBy="postcodes")
     */
    private  $city;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new ArrayCollection();
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
     * @return mixed
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param mixed $locality
     */
    public function setLocality(Localities $locality)
    {
        $this->locality = $locality;
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
        //$user->setPostcode($this);
    }

    /**
     * @param mixed $user
     */
    public function removeUser(Users $user)
    {
        $this->user->removeElement($user);
        // uncomment if you want to update other side
        //$user->setPostcode(null);
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
     * Set postalCode
     *
     * @param string $postcode
     *
     * @return Postcodes
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }
}

