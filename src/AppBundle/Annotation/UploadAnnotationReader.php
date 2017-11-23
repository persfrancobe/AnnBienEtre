<?php
/**
 * Created by PhpStorm.
 * User: Ehsan
 * Date: 11/10/2017
 * Time: 22:50
 */

namespace AppBundle\Annotation;


use Doctrine\Common\Annotations\AnnotationReader;

class UploadAnnotationReader
{
    private $reader;

    public function __construct(AnnotationReader $reader)
    {
        $this->reader=$reader;
    }
    public function IsUploadable($entity):bool {
        $reflection= new \ReflectionClass(get_class($entity));
        return $this->reader->getClassAnnotation($reflection,Uploadable::class)!==  null;
    }

    public function getUploadableFields($entity):array {
        $reflection= new \ReflectionClass(get_class($entity));
        if (!$this->IsUploadable($entity)){
            return[];
        }
        $proerities=[];
        foreach ($reflection->getProperties() as $property){
            $annotation=$this->reader->getPropertyAnnotation($property,UploadableField::class);
           if($annotation!== null){
               $proerities[$property->getName()]=$annotation;
           };
        }
        return $proerities;
    }

}