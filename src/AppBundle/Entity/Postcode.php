<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Postcode
 *
 * @ORM\Table(name="postcodes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostcodeRepository")
 */
class Postcode
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
     * @ORM\OneToMany(targetEntity="User", mappedBy="postcode")
     */
    private $users;


    /**
     * @ORM\ManyToOne(targetEntity="Locality", inversedBy="postcodes")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private  $locality;

    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="postcodes")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private  $city;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }


    public function __toString()
    {
        return $this->postcode;
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
     * @return mixed
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param mixed $locality
     */
    public function setLocality(Locality $locality)
    {
        $this->locality = $locality;
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
        //$users->setPostcode($this);
    }

    /**
     * @param mixed $user
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
        // uncomment if you want to update other side
        //$users->setPostcode(null);
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
     * @return Postcode
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

