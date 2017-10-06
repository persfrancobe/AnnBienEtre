<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 * @ORM\InheritanceType
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="user_type", type="string")
 * @ORM\DiscriminatorMap({"admin"="Users","provider" = "Providers", "visitor" = "Visitors"})
 */
class Users
{

    const TYPE_USER = "admin";
    const TYPE_PROVIDER = "provider";
    const TYPE_VISITOR = "visitor";
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    protected $password;

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
     * @ORM\Column(name="bann", type="boolean")
     */
    protected $bann;

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
     * @ORM\ManyToOne(targetEntity="Cities", inversedBy="users")
     */
    protected  $city;

    /**
     * @ORM\ManyToOne(targetEntity="Localities", inversedBy="users")
     */
    protected  $locality;

    /**
     * @ORM\ManyToOne(targetEntity="PostalCodes", inversedBy="users")
     */
    protected  $postalCode;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Blocks",mappedBy="users")
     */
    protected $block;

    /**
     * Constructor
     */
    public function __construct(){
        $this->user_type=Users::TYPE_USER;
        $this->block=new ArrayCollection();
        $this->registration=new \DateTime();
    }

    /**
     * @param mixed $block
     */
    public function addBlock(Blocks $block)
    {
        $this->block->add($block);
        // uncomment if you want to update other side
        //$block->setUser($this);
    }

    /**
     * @param mixed $block
     */
    public function removeBlock(Blocks $block)
    {
        $this->block->removeElement($block);
        // uncomment if you want to update other side
        //$block->setUser(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getBlock()
    {
        return $this->block;
    }


    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode(PostalCodes $postalCode)
    {
        $this->postalCode = $postalCode;
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set housNum
     *
     * @param string $housNum
     *
     * @return Users
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
     * @return Users
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
     * @return Users
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
     * Get userType
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * Set bann
     *
     * @param boolean $bann
     *
     * @return Users
     */
    public function setBann($bann)
    {
        $this->bann = $bann;

        return $this;
    }

    /**
     * Get bann
     *
     * @return bool
     */
    public function getBann()
    {
        return $this->bann;
    }

    /**
     * Set registrationConf
     *
     * @param boolean $registrationConf
     *
     * @return Users
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
     * @return Users
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

