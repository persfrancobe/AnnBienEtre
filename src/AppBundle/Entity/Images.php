<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Images
 *
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImagesRepository")
 */
class Images
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
     * @ORM\Column(name="image", type="blob")
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="imgOrder", type="integer")
     */
    private $imgOrder;

    /**
     * @ORM\ManyToOne(targetEntity="Courses", inversedBy="images")
     */
    private  $course;

    /**
     * @ORM\ManyToOne(targetEntity="Promotions", inversedBy="images")
     */
    private  $promotion;

    /**
     * @ORM\ManyToOne(targetEntity="Providers", inversedBy="images")
     */
    private  $provider;

    /**
     * @ORM\ManyToOne(targetEntity="ServiceCategories", inversedBy="images")
     */
    private  $serviceCategory;

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
     * @return mixed
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion(Promotions $promotion)
    {
        $this->promotion = $promotion;
    }



    /**
     * @return mixed
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param mixed $course
     */
    public function setCourse(Courses $course)
    {
        $this->course = $course;
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
     * Set image
     *
     * @param string $image
     *
     * @return Images
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set imgOrder
     *
     * @param integer $imgOrder
     *
     * @return Images
     */
    public function setImgOrder($imgOrder)
    {
        $this->imgOrder = $imgOrder;

        return $this;
    }

    /**
     * Get imgOrder
     *
     * @return int
     */
    public function getImgOrder()
    {
        return $this->imgOrder;
    }
}

