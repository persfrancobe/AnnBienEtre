<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\InheritanceType
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="user_type", type="string")
 * @ORM\DiscriminatorMap({"admin"="User","provider" = "Provider", "visitor" = "Visitor"})
 */
class User extends BaseUser
{

    const TYPE_USER = "admin";
    const TYPE_PROVIDER = "provider";
    const TYPE_VISITOR = "visitor";

    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_PROVIDER = 'ROLE_PROVIDER';
    const ROLE_VISITOR = 'ROLE_VISITOR';


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="housNum", type="string", length=255)
     */
    protected $housNum;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    protected $street;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration", type="date")
     */
    protected $registration;


    /**
     * @var bool
     *
     * @ORM\Column(name="registrationConf", type="boolean")
     */
    protected $registrationConf;

    /**
     * @var int
     *
     * @ORM\Column(name="unsuccessfulTestNum", type="integer")
     */
    protected $unsuccessfulTestNum;

    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="users")
     */
    protected  $city;

    /**
     * @ORM\ManyToOne(targetEntity="Locality", inversedBy="users")
     */
    protected  $locality;

    /**
     * @ORM\ManyToOne(targetEntity="Postcode", inversedBy="users")
     */
    protected  $postcode;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Block",mappedBy="user")
     */
    protected $blocks;

    /**
     * Constructor
     */
    public function __construct(){
        parent:: __construct();
        $this->blocks=new ArrayCollection();
        $this->registration=new \DateTime();
        $this->addRole('role_admin');
    }

    /**
     * @param mixed $block
     */
    public function addBlock(Block $block)
    {
        $this->blocks->add($block);
        // uncomment if you want to update other side
        //$blocks->setUser($this);
    }

    /**
     * @param mixed $block
     */
    public function removeBlock(Block $block)
    {
        $this->blocks->removeElement($block);
        // uncomment if you want to update other side
        //$blocks->setUser(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getBlocks()
    {
        return $this->blocks;
    }


    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode(Postcode $postcode)
    {
        $this->postcode = $postcode;
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set housNum
     *
     * @param string $housNum
     *
     * @return User
     */
    public function setHousNum($housNum)
    {
        $this->housNum = $housNum;

        return $this;
    }

    /**
     * Get housNum
     *
     * @return string
     */
    public function getHousNum()
    {
        return $this->housNum;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return User
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set registration
     *
     * @param \DateTime $registration
     *
     * @return User
     */
    public function setRegistration($registration)
    {
        $this->registration = $registration;

        return $this;
    }

    /**
     * Get registration
     *
     * @return \DateTime
     */
    public function getRegistration()
    {
        return $this->registration;
    }
    /**
     * Set registrationConf
     *
     * @param boolean $registrationConf
     *
     * @return User
     */
    public function setRegistrationConf($registrationConf)
    {
        $this->registrationConf = $registrationConf;

        return $this;
    }

    /**
     * Get registrationConf
     *
     * @return bool
     */
    public function getRegistrationConf()
    {
        return $this->registrationConf;
    }

    /**
     * Set unsuccessfulTestNum
     *
     * @param integer $unsuccessfulTestNum
     *
     * @return User
     */
    public function setUnsuccessfulTestNum($unsuccessfulTestNum)
    {
        $this->unsuccessfulTestNum = $unsuccessfulTestNum;

        return $this;
    }

    /**
     * Get unsuccessfulTestNum
     *
     * @return int
     */
    public function getUnsuccessfulTestNum()
    {
        return $this->unsuccessfulTestNum;
    }
}

