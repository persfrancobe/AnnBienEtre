<?php

namespace AppBundle\Entity;

use AppBundle\Annotation\UploadableField;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\File\File;
use AppBundle\Annotation\Uploadable;
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
     * @ORM\Column(name="image", type="string",nullable=true,)
     */
    private $image;

    /**
     * @UploadableField(filename="image",path="uploads",webpath="webPath")
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
     * @ORM\ManyToOne(targetEntity="Provider", inversedBy="images")
     */
    private  $provider;


    /**
     * @return string
     */
    public function __toString()
    {
        if(is_null($this->webPath)){
            return '';
        }
        return $this->webPath;
    }


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

