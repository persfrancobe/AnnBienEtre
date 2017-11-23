<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Promotion
 *
 * @ORM\Table(name="promotions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionRepository")
 */
class Promotion
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
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug",type="string")
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="Provider", inversedBy="promotions")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected  $provider;

    /**
     * @ORM\ManyToOne(targetEntity="ServiceCategory", inversedBy="promotions")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected  $serviceCategory;

    /**
     * @var Image
     * @ORM\ManyToOne(targetEntity="Image",cascade={"persist"})
     */
    private $image;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->start=new DateTime();
        $this->end=new DateTime();
        $this->displayUp=new DateTime();
        $this->displayOf=new DateTime();
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
     * @return mixed
     */
    public function getServiceCategory()
    {
        return $this->serviceCategory;
    }

    /**
     * @param mixed $serviceCategory
     */
    public function setServiceCategory(ServiceCategory $serviceCategory)
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
    public function setProvider(Provider $provider)
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
     * @return Promotion
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
     * @return Promotion
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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Promotion
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
     * @return Promotion
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
     * @return Promotion
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
     * @return Promotion
     */
    public function setDisplayUp($displayUp)
    {
        $this->displayUp = $displayUp;

        return $this;
    }

    /**
     * Get displayUp
     *
     * @return \DateTime
     */
    public function getDisplayUp()
    {
        return $this->displayUp;
    }
}

