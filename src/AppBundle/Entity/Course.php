<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Course
 *
 * @ORM\Table(name="courses")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CourseRepository")
 */
class Course
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
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

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
     * @var string
     *
     * @ORM\Column(name="info", type="string", length=255)
     */
    private $info;

    /**
     * @ORM\ManyToOne(targetEntity="Provider", inversedBy="courses")
     *@ORM\JoinColumn(onDelete="SET NULL")
     */
    private  $provider;

    /**
     * @ORM\ManyToOne(targetEntity="ServiceCategory", inversedBy="courses")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private  $serviceCategory;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Image", mappedBy="course",cascade={"persist"})
     */
    private $images;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images=new ArrayCollection();
        $this->displayOf=new DateTime();
        $this->displayUp=new DateTime();
        $this->end=new DateTime();
        $this->start=new DateTime();
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
    public function setServiceCategory($serviceCategory)
    {
        $this->serviceCategory = $serviceCategory;
    }


    /**
     * @param mixed $image
     */
    public function addImage(Image $image)
    {
        $this->images->add($image);
        // uncomment if you want to update other side
        //$images->setCourse($this);
    }

    /**
     * @param mixed $image
     */
    public function removeImage(Image $image)
    {
        $this->images->removeElement($image);
        // uncomment if you want to update other side
        //$images->setCourse(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
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
     * @return Course
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
     * @return Course
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
     * Set price
     *
     * @param string $price
     *
     * @return Course
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Course
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
     * @return Course
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
     * @return Course
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
     * @param \DateTime $displayUp
     *
     * @return Course
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

    /**
     * Set info
     *
     * @param string $info
     *
     * @return Course
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }
}

