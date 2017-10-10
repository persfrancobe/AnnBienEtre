<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImageRepository")
 */
class Image
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
     * @ORM\Column(name="webPath", type="blob")
     */
    private $webPath;

    /**
     * @var int
     *
     * @ORM\Column(name="imgOrder", type="integer")
     */
    private $imgOrder;

    /**
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="images")
     */
    private  $course;

    /**
     * @ORM\ManyToOne(targetEntity="Promotion", inversedBy="images")
     */
    private  $promotion;

    /**
     * @ORM\ManyToOne(targetEntity="Provider", inversedBy="images")
     */
    private  $provider;

    /**
     * @ORM\ManyToOne(targetEntity="ServiceCategory", inversedBy="images")
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
     * @return mixed
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion(Promotion $promotion)
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
    public function setCourse(Course $course)
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
     * Set webPath
     *
     * @param string $webPath
     *
     * @return Image
     */
    public function setWebPath($webPath)
    {
        $this->webPath=$webPath;

        return $this;
    }

    /**
     * Get webPath
     *
     * @return string
     */
    public function getWebPath()
    {
        return $this->webPath;
    }

    /**
     * Set imgOrder
     *
     * @param integer $imgOrder
     *
     * @return Image
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

