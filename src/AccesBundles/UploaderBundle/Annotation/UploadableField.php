<?php
/**
 * Created by PhpStorm.
 * User: Ehsan
 * Date: 11/10/2017
 * Time: 22:20
 */

namespace AccesBundles\UploaderBundle\Annotation;
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

    public function __construct(array $option)
    {
        if(empty($option['filename'])){
            throw new \InvalidArgumentException("L'Annotation uploadablefield dois avoir un attribut 'filename'");
        }
        if(empty($option['path'])){
            throw new \InvalidArgumentException("L'Annotation uploadablefield dois avoir un attribut 'path'");
        }
        $this->filename= $option['filename'];
        $this->path= $option['path'];
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


}