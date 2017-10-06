<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PostalCodes
 *
 * @ORM\Table(name="postal_codes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostalCodesRepository")
 */
class PostalCodes
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
     * @ORM\Column(name="postalCode", type="string", length=255)
     */
    private $postalCode;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Users", mappedBy="postalCodes")
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="Localities", inversedBy="postalCodes")
     */
    private  $locality;

    /**
     * @ORM\ManyToOne(targetEntity="Cities", inversedBy="postalCodes")
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
        //$user->setPostalCode($this);
    }

    /**
     * @param mixed $user
     */
    public function removeUser(Users $user)
    {
        $this->user->removeElement($user);
        // uncomment if you want to update other side
        //$user->setPostalCode(null);
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
     * @param string $postalCode
     *
     * @return PostalCodes
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }
}

