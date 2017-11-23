<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ServiceCategory
 *
 * @ORM\Table(name="service_categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceCategoryRepository")
 */
class ServiceCategory
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="inAction", type="boolean")
     */
    private $inAction;

    /**
     * @var bool
     *
     * @ORM\Column(name="validated", type="boolean")
     */
    private $validated;

    /**
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug",type="string")
     */
    private $slug;


    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Provider",inversedBy="serviceCategories")
     */
    private $providers;

    /**
     * @var Image
     * @ORM\OneToOne(targetEntity="Image",cascade={"persist","remove"})
     */
    private $image;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Promotion", mappedBy="serviceCategory",cascade={"persist"})
     */
    private $promotions;
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Course", mappedBy="serviceCategory")
     */
    private $courses;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotions=new ArrayCollection();
        $this->providers=new ArrayCollection();
        $this->courses=new ArrayCollection();
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
    public function addCourse($course)
    {
        $this->courses->add($course);
        // uncomment if you want to update other side
        //$course->setServiceCategory($this);
    }

    /**
     * @param mixed $course
     */
    public function removeCourse($course)
    {
        $this->courses->removeElement($course);
        // uncomment if you want to update other side
        //$course->setServiceCategory(null);
    }


    /**
     * @param mixed $promotion
     */
    public function addPromotion(Promotion $promotion)
    {
        $this->promotions->add($promotion);
        // uncomment if you want to update other side
        //$promotions->setServiceCategory($this);
    }

    /**
     * @param mixed $promotion
     */
    public function removePromotion(Promotion $promotion)
    {
        $this->promotions->removeElement($promotion);
        // uncomment if you want to update other side
        //$promotions->setServiceCategory(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getPromotions()
    {
        return $this->promotions;
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        return $this->image;
    }

    /**
     * @param Image $image
     */
    public function setImage(Image $image): void
    {
        $this->image = $image;
    }



    /**
     * @param mixed $provider
     */
    public function addProvider(Provider $provider)
    {
        $this->providers->add($provider);
        // uncomment if you want to update other side
        //$providers->setServiceCategory($this);
    }

    /**
     * @param mixed $provider
     */
    public function removeProvider(Provider $provider)
    {
        $this->providers->removeElement($provider);
        // uncomment if you want to update other side
        //$providers->setServiceCategory(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getProviders()
    {
        return $this->providers;
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
     * Set name
     *
     * @param string $name
     *
     * @return ServiceCategory
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
     * Set description
     *
     * @param string $description
     *
     * @return ServiceCategory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set inAction
     *
     * @param boolean $inAction
     *
     * @return ServiceCategory
     */
    public function setInAction($inAction)
    {
        $this->inAction = $inAction;

        return $this;
    }

    /**
     * Get inAction
     *
     * @return bool
     */
    public function getInAction()
    {
        return $this->inAction;
    }

    /**
     * Set validated
     *
     * @param boolean $validated
     *
     * @return ServiceCategory
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;

        return $this;
    }

    /**
     * Get validated
     *
     * @return bool
     */
    public function getValidated()
    {
        return $this->validated;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

}

