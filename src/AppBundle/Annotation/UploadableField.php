<?php
/**
 * Created by PhpStorm.
 * User: Ehsan
 * Date: 11/10/2017
 * Time: 22:20
 */

namespace AppBundle\Annotation;
use Doctrine\Common\Annotations\Annotation\Target;
use Psr\Log\InvalidArgumentException;

/**
 * @Annotation
 *
 * @Target("PROPERTY")
 */
class UploadableField
{
    /**
     * @var string
     */
    private $filename;

    /**
     * @var string
     */
       private $path;

    /**
     * @var string
     */
    private $webpath;
    public function __construct(array $option)
    {
        if(empty($option['filename'])){
            throw new \InvalidArgumentException("L'Annotation uploadablefield dois avoir un attribut 'filename'");
        }
        if(empty($option['path'])){
            throw new \InvalidArgumentException("L'Annotation uploadablefield dois avoir un attribut 'path'");
        }
        if(empty($option['webpath'])){
            throw new \InvalidArgumentException("L'Annotation uploadablefield dois avoir un attribut 'webpath'");
        }
        $this->filename= $option['filename'];
        $this->path= $option['path'];
        $this->webpath= $option['webpath'];
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getWebpath(): string
    {
        return $this->webpath;
    }



}