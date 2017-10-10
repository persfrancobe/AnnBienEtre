<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * Provider
 *
 * @ORM\Table(name="providers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProviderRepository")
 */
class Provider extends User
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
     * @ORM\OneToMany(targetEntity="Promotion", mappedBy="provider")
     */
    private $promotions;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Course", mappedBy="provider")
     */
    private $courses;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="provider")
     */
    private $comments;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Image", mappedBy="provider")
     */
    private $images;


    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="ServiceCategory", mappedBy="providers")
     */
    private $serviceCategories;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Favorite", mappedBy="provider")
     */
    private $favorites;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Note", mappedBy="provider")
     */
    private $notes;

    /**
     * Constructor
     */
    public function __construct(){

        parent:: __construct();
        $this->promotions=new ArrayCollection();
        $this->courses=new ArrayCollection();
        $this->comments=new ArrayCollection();
        $this->images=new ArrayCollection();
        $this->serviceCategories=new ArrayCollection();
        $this->favorites=new ArrayCollection();
        $this->addRole('role_provider');
    }

    /**
     * @param mixed $note
     */
    public function addNote(Note $note)
    {
        $this->notes->add($note);
        // uncomment if you want to update other side
        //$notes->setProvider($this);
    }

    /**
     * @param mixed $note
     */
    public function removeNote(Note $note)
    {
        $this->notes->removeElement($note);
        // uncomment if you want to update other side
        //$notes->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $favorite
     */
    public function addFavorite(Favorite $favorite)
    {
        $this->favorites->add($favorite);
        // uncomment if you want to update other side
        //$favorites->setProvider($this);
    }

    /**
     * @param mixed $favorite
     */
    public function removeFavorite(Favorite $favorite)
    {
        $this->favorites->removeElement($favorite);
        // uncomment if you want to update other side
        //$favorites->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getFavorites()
    {
        return $this->favorites;
    }



    /**
     * @param mixed $serviceCategory
     */
    public function addServiceCategory(ServiceCategory $serviceCategory)
    {
        $this->serviceCategories->add($serviceCategory);
        // uncomment if you want to update other side
        //$serviceCategories->setProvider($this);
    }

    /**
     * @param mixed $serviceCategory
     */
    public function removeServiceCategory(ServiceCategory $serviceCategory)
    {
        $this->serviceCategories->removeElement($serviceCategory);
        // uncomment if you want to update other side
        //$serviceCategories->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getServiceCategories()
    {
        return $this->serviceCategories;
    }



    /**
     * @param mixed $image
     */
    public function addImage(Image $image)
    {
        $this->images->add($image);
        // uncomment if you want to update other side
        //$images->setProvider($this);
    }

    /**
     * @param mixed $image
     */
    public function removeImage(Image $image)
    {
        $this->images->removeElement($image);
        // uncomment if you want to update other side
        //$images->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }


    /**
     * @return ArrayCollection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comment
     */
    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);
        // uncomment if you want to update other side
        //$comments->setProvider($this);
    }

    /**
     * @param mixed $comment
     */
    public function removeComment(Comment $comment)
    {
        $this->comments->removeElement($comment);
        // uncomment if you want to update other side
        //$comments->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * @param mixed $course
     */
    public function addCourse(Course $course)
    {
        $this->courses->add($course);
        // uncomment if you want to update other side
        //$courses->setProvider($this);
    }

    /**
     * @param mixed $course
     */
    public function removeCourse(Course $course)
    {
        $this->courses->removeElement($course);
        // uncomment if you want to update other side
        //$courses->setProvider(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getPromotions()
    {
        return $this->promotions;
    }

    /**
     * @param mixed $promotion
     */
    public function addPromotion(Promotion $promotion)
    {
        $this->promotions->add($promotion);
        // uncomment if you want to update other side
        //$promotions->setProvider($this);
    }

    /**
     * @param mixed $promotion
     */
    public function removePromotion(Promotion $promotion)
    {
        $this->promotions->removeElement($promotion);
        // uncomment if you want to update other side
        //$promotions->setProvider(null);
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Provider
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
     * @return Provider
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
     * @return Provider
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
     * @return Provider
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
     * @return Provider
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

