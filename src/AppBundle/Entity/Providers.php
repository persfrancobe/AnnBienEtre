<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Users;

/**
 * Providers
 *
 * @ORM\Table(name="providers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProvidersRepository")
 */
class Providers extends Users
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="internetSite", type="string", length=255)
     */
    private $internetSite;

    /**
     * @var string
     *
     * @ORM\Column(name="contactEmail", type="string", length=255)
     */
    private $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="telNum", type="string", length=255)
     */
    private $telNum;

    /**
     * @var string
     *
     * @ORM\Column(name="tvaNum", type="string", length=255)
     */
    private $tvaNum;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Promotions", mappedBy="providers")
     */
    private $promotion;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Courses", mappedBy="providers")
     */
    private $course;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="providers")
     */
    private $comment;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Images", mappedBy="providers")
     */
    private $image;


    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="ServiceCategories", mappedBy="providers")
     */
    private $serviceCategory;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Favorites", mappedBy="providers")
     */
    private $favorite;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Notes", mappedBy="providers")
     */
    private $note;

    /**
     * Constructor
     */
    public function __construct(){

        parent:: __construct();
        $this->user_type=Users::TYPE_PROVIDER;
        $this->promotion=new ArrayCollection();
        $this->course=new ArrayCollection();
        $this->comment=new ArrayCollection();
        $this->image=new ArrayCollection();
        $this->serviceCategory=new ArrayCollection();
        $this->favorite=new ArrayCollection();
        $this->addRole('role_provider');
    }

    /**
     * @param mixed $note
     */
    public function addNote(Notes $note)
    {
        $this->note->add($note);
        // uncomment if you want to update other side
        //$note->setProvider($this);
    }

    /**
     * @param mixed $note
     */
    public function removeNote(Notes $note)
    {
        $this->note->removeElement($note);
        // uncomment if you want to update other side
        //$note->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $favorite
     */
    public function addFavorite(Favorites $favorite)
    {
        $this->favorite->add($favorite);
        // uncomment if you want to update other side
        //$favorite->setProvider($this);
    }

    /**
     * @param mixed $favorite
     */
    public function removeFavorite(Favorites $favorite)
    {
        $this->favorite->removeElement($favorite);
        // uncomment if you want to update other side
        //$favorite->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getFavorite()
    {
        return $this->favorite;
    }



    /**
     * @param mixed $serviceCategory
     */
    public function addServiceCategory(ServiceCategories $serviceCategory)
    {
        $this->serviceCategory->add($serviceCategory);
        // uncomment if you want to update other side
        //$serviceCategory->setProvider($this);
    }

    /**
     * @param mixed $serviceCategory
     */
    public function removeServiceCategory(ServiceCategories $serviceCategory)
    {
        $this->serviceCategory->removeElement($serviceCategory);
        // uncomment if you want to update other side
        //$serviceCategory->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getServiceCategory()
    {
        return $this->serviceCategory;
    }



    /**
     * @param mixed $image
     */
    public function addImage(Images $image)
    {
        $this->image->add($image);
        // uncomment if you want to update other side
        //$image->setProvider($this);
    }

    /**
     * @param mixed $image
     */
    public function removeImage(Images $image)
    {
        $this->image->removeElement($image);
        // uncomment if you want to update other side
        //$image->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getImage()
    {
        return $this->image;
    }


    /**
     * @return ArrayCollection
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function addComment(Comments $comment)
    {
        $this->comment->add($comment);
        // uncomment if you want to update other side
        //$comment->setProvider($this);
    }

    /**
     * @param mixed $comment
     */
    public function removeComment(Comments $comment)
    {
        $this->comment->removeElement($comment);
        // uncomment if you want to update other side
        //$comment->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param mixed $course
     */
    public function addCourse(Courses $course)
    {
        $this->course->add($course);
        // uncomment if you want to update other side
        //$course->setProvider($this);
    }

    /**
     * @param mixed $course
     */
    public function removeCourse(Courses $course)
    {
        $this->course->removeElement($course);
        // uncomment if you want to update other side
        //$course->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function addPromotion(Promotions $promotion)
    {
        $this->promotion->add($promotion);
        // uncomment if you want to update other side
        //$promotion->setProvider($this);
    }

    /**
     * @param mixed $promotion
     */
    public function removePromotion(Promotions $promotion)
    {
        $this->promotion->removeElement($promotion);
        // uncomment if you want to update other side
        //$promotion->setProvider(null);
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Providers
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set internetSite
     *
     * @param string $internetSite
     *
     * @return Providers
     */
    public function setInternetSite($internetSite)
    {
        $this->internetSite = $internetSite;

        return $this;
    }

    /**
     * Get internetSite
     *
     * @return string
     */
    public function getInternetSite()
    {
        return $this->internetSite;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     *
     * @return Providers
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Set telNum
     *
     * @param string $telNum
     *
     * @return Providers
     */
    public function setTelNum($telNum)
    {
        $this->telNum = $telNum;

        return $this;
    }

    /**
     * Get telNum
     *
     * @return string
     */
    public function getTelNum()
    {
        return $this->telNum;
    }

    /**
     * Set tvaNum
     *
     * @param string $tvaNum
     *
     * @return Providers
     */
    public function setTvaNum($tvaNum)
    {
        $this->tvaNum = $tvaNum;

        return $this;
    }

    /**
     * Get tvaNum
     *
     * @return string
     */
    public function getTvaNum()
    {
        return $this->tvaNum;
    }
}

