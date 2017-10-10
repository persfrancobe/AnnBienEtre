<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

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
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Provider", inversedBy="serviceCategories")
     */
    private $providers;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Image", mappedBy="serviceCategory")
     */
    private $images;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Promotion", mappedBy="serviceCategory")
     */
    private $promotions;

    public function __toString()
    {
        return $this->description;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotions=new ArrayCollection();
        $this->images=new ArrayCollection();
        $this->providers=new ArrayCollection();
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
     * @param mixed $image
     */
    public function addImage(Image $image)
    {
        $this->images->add($image);
        // uncomment if you want to update other side
        //$images->setServiceCategory($this);
    }

    /**
     * @param mixed $image
     */
    public function removeImage(Image $image)
    {
        $this->images->removeElement($image);
        // uncomment if you want to update other side
        //$images->setServiceCategory(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
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
}

