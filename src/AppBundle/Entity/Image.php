<?php

namespace AppBundle\Entity;

use AccesBundles\UploaderBundle\Annotation\UploadableField;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\File\File;
use AccesBundles\UploaderBundle\Annotation\Uploadable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Image
 *
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImageRepository")
 * @Uploadable()
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
     * @ORM\Column(name="webPath", type="string")
     */
    private $webPath;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string",nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string",nullable=true)
     */
    private $type;
    /**
     * @UploadableField(filename="webPath",path="uploads")
     *
     */
    private $file;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updateAt",type="datetime",nullable=true)
     *
     */
    private $updateAt;

    /**
     * @var int
     *
     * @ORM\Column(name="imgOrder", type="integer",nullable=true)
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
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return File|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param File $file|null
     */
    public function setFile($file)
    {
        $this->file = $file;
    }



    /**
     * @return DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * @param DateTime $updateAt
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
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

