<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceCategories
 *
 * @ORM\Table(name="service_categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceCategoriesRepository")
 */
class ServiceCategories
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
     * @ORM\ManyToMany(targetEntity="Providers", inversedBy="serviceCategories")
     */
    private $provider;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Images", mappedBy="serviceCategories")
     */
    private $image;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Promotions", mappedBy="serviceCategories")
     */
    private $promotion;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotion=new ArrayCollection();
        $this->image=new ArrayCollection();
        $this->provider=new ArrayCollection();
    }


    /**
     * @param mixed $promotion
     */
    public function addPromotion(Promotions $promotion)
    {
        $this->promotion->add($promotion);
        // uncomment if you want to update other side
        //$promotion->setServiceCategory($this);
    }

    /**
     * @param mixed $promotion
     */
    public function removePromotion(Promotions $promotion)
    {
        $this->promotion->removeElement($promotion);
        // uncomment if you want to update other side
        //$promotion->setServiceCategory(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getPromotion()
    {
        return $this->promotion;
    }



    /**
     * @param mixed $image
     */
    public function addImage(Images $image)
    {
        $this->image->add($image);
        // uncomment if you want to update other side
        //$image->setServiceCategory($this);
    }

    /**
     * @param mixed $image
     */
    public function removeImage(Images $image)
    {
        $this->image->removeElement($image);
        // uncomment if you want to update other side
        //$image->setServiceCategory(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getImage()
    {
        return $this->image;
    }



    /**
     * @param mixed $provider
     */
    public function addProvider(Providers $provider)
    {
        $this->provider->add($provider);
        // uncomment if you want to update other side
        //$provider->setServiceCategory($this);
    }

    /**
     * @param mixed $provider
     */
    public function removeProvider(Providers $provider)
    {
        $this->provider->removeElement($provider);
        // uncomment if you want to update other side
        //$provider->setServiceCategory(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getProvider()
    {
        return $this->provider;
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
     * @return ServiceCategories
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
     * @return ServiceCategories
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
     * @return ServiceCategories
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
     * @return ServiceCategories
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

