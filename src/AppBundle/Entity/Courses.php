<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Courses
 *
 * @ORM\Table(name="courses")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoursesRepository")
 */
class Courses
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
     * @ORM\Column(name="info", type="string", length=255, nullable=true)
     */
    private $info;

    /**
     * @ORM\ManyToOne(targetEntity="Providers", inversedBy="courses")
     */
    private  $provider;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Images", mappedBy="courses")
     */
    private $image;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image=new ArrayCollection();
        $this->displayOf=new DateTime();
        $this->displayUp=new DateTime();
        $this->end=new DateTime();
        $this->start=new DateTime();
    }


    /**
     * @param mixed $image
     */
    public function addImage(Images $image)
    {
        $this->image->add($image);
        // uncomment if you want to update other side
        //$image->setCourse($this);
    }

    /**
     * @param mixed $image
     */
    public function removeImage(Images $image)
    {
        $this->image->removeElement($image);
        // uncomment if you want to update other side
        //$image->setCourse(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getImage()
    {
        return $this->image;
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
     * @return Courses
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
     * @return Courses
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
     * @return Courses
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
     * @return Courses
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
     * @return Courses
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
     * @return Courses
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
     * @return Courses
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
     * @return Courses
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

