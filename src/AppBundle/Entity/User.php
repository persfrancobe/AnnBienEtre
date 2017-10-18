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
class User
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
     * @var string
     *
     * @ORM\Column(name="username",type="string")
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical",type="string")
     */
    protected $usernameCanonical;
    /**
     * @var string
     *
     * @ORM\Column(name="password",type="string")
     */
    protected $password;
    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical",type="string")
     */
    protected $emailCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="email",type="string")
     */
    protected $email;
    /**
     * @var string
     *
     * @ORM\Column(name="salt",type="string")
     */
    protected $salt;
    /**
     * @var string
     *
     * @ORM\Column(name="role",type="text")
     */
    protected $role;
    /**
     * @var boolean
     *
     * @ORM\Column(name="banned",type="boolean")
     */
    protected $banned;
    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled",type="boolean")
     */
    protected $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmation_token",type="string")
     */
    protected $confirmationToken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="date")
     */
    protected $lastLogin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_requested_at", type="date")
     */
    protected $passwordRequestedAt;

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
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsernameCanonical(): string
    {
        return $this->usernameCanonical;
    }

    /**
     * @param string $usernameCanonical
     */
    public function setUsernameCanonical(string $usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmailCanonical(): string
    {
        return $this->emailCanonical;
    }

    /**
     * @param string $emailCanonical
     */
    public function setEmailCanonical(string $emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt(string $salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role)
    {
        $this->role = $role;
    }

    /**
     * @return bool
     */
    public function isBanned(): bool
    {
        return $this->banned;
    }

    /**
     * @param bool $banned
     */
    public function setBanned(bool $banned)
    {
        $this->banned = $banned;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getConfirmationToken(): string
    {
        return $this->confirmationToken;
    }

    /**
     * @param string $confirmationToken
     */
    public function setConfirmationToken(string $confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;
    }

    /**
     * @return \DateTime
     */
    public function getLastLogin(): \DateTime
    {
        return $this->lastLogin;
    }

    /**
     * @param \DateTime $lastLogin
     */
    public function setLastLogin(\DateTime $lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return \DateTime
     */
    public function getPasswordRequestedAt(): \DateTime
    {
        return $this->passwordRequestedAt;
    }

    /**
     * @param \DateTime $passwordRequestedAt
     */
    public function setPasswordRequestedAt(\DateTime $passwordRequestedAt)
    {
        $this->passwordRequestedAt = $passwordRequestedAt;
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

