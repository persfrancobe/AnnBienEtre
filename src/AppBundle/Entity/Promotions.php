<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Promotions
 *
 * @ORM\Table(name="promotions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionsRepository")
 */
class Promotions
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
     * @var string
     *
     * @ORM\Column(name="pdf", type="blob")
     */
    private $pdf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="date")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="date")
     */
    private $end;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="displayOf", type="date")
     */
    private $displayOf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="displayUp", type="date")
     */
    private $displayUp;

    /**
     * @ORM\ManyToOne(targetEntity="Providers", inversedBy="promotions")
     */
    protected  $provider;

    /**
     * @ORM\ManyToOne(targetEntity="ServiceCategories", inversedBy="promotions")
     */
    protected  $serviceCategory;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Images", mappedBy="promotions")
     */
    private $image;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image=new ArrayCollection();
        $this->start=new DateTime();
        $this->end=new DateTime();
        $this->displayUp=new DateTime();
        $this->displayOf=new DateTime();
    }

    /**
     * @return ArrayCollection
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function addImage(Images $image)
    {
        $this->image->add($image);
        // uncomment if you want to update other side
        //$image->setPromotion($this);
    }

    /**
     * @param mixed $image
     */
    public function removeImage(Images $image)
    {
        $this->image->removeElement($image);
        // uncomment if you want to update other side
        //$image->setPromotion(null);
    }


    /**
     * @return mixed
     */
    public function getServiceCategory()
    {
        return $this->serviceCategory;
    }

    /**
     * @param mixed $serviceCategory
     */
    public function setServiceCategory(ServiceCategories $serviceCategory)
    {
        $this->serviceCategory = $serviceCategory;
    }


    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider(Providers $provider)
    {
        $this->provider = $provider;
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
     * @return Promotions
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
     * @return Promotions
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
     * Set pdf
     *
     * @param string $pdf
     *
     * @return Promotions
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get pdf
     *
     * @return string
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Promotions
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Promotions
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set displayOf
     *
     * @param \DateTime $displayOf
     *
     * @return Promotions
     */
    public function setDisplayOf($displayOf)
    {
        $this->displayOf = $displayOf;

        return $this;
    }

    /**
     * Get displayOf
     *
     * @return \DateTime
     */
    public function getDisplayOf()
    {
        return $this->displayOf;
    }

    /**
     * Set displayUp
     *
     * @param string $displayUp
     *
     * @return Promotions
     */
    public function setDisplayUp($displayUp)
    {
        $this->displayUp = $displayUp;

        return $this;
    }

    /**
     * Get displayUp
     *
     * @return string
     */
    public function getDisplayUp()
    {
        return $this->displayUp;
    }
}

