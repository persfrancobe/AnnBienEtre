<?php

namespace AppBundle\DataFixtures\Faker\Provider;

class MyProvider extends \Faker\Provider\fr_BE\Person
{
    public static function webPath()
    {
        $web=array();
        for ($i=1;$i<15;$i++) {
            $web[$i] = 'uploads\product-' . $i . '.jpg';
        }
        return static::randomElement($web);
    }
    public static function facebook(){
        return static::randomElement(static::$lastName).'@facebook.com';
    }
    public static function twitter(){
        return static::randomElement(static::$lastName).'@twitter.com';
    }
    public static function advisor(){
        return static::randomElement(static::$lastName).'@advisor.com';
    }
    public static function gmail(){
        return static::randomElement(static::$lastName).'@gmail.com';
    }
    public static function youtube(){
        return static::randomElement(static::$lastName).'@youtube.com';
    }
    public static function userNameUnique(){
        return static::randomElement(static::$lastName).rand(1,999999);
    }
    public static function EmailUnique(){
        return static::randomElement(static::$lastName).rand(1,999999).'@gmail.com';
    }
    protected static $category=array('Massage','Pedicure','Manicure','Yoga','Acupuncture','Fitness','RelaxingRoom','MassageThailand','Hamam','Jacouzz','piscine');
    public static function categoryName(){
        return static::randomElement(static::$category).rand(1,999999);
    }

}