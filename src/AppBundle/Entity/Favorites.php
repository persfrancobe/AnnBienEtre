<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Favorites
 *
 * @ORM\Table(name="favorites")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FavoritesRepository")
 */
class Favorites
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Providers", inversedBy="favorites")
     */
    protected  $provider;

    /**
     * @ORM\ManyToOne(targetEntity="Visitors", inversedBy="favorites")
     */
    protected  $visitor;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date=new DateTime();
    }

    /**
     * @return mixed
     */
    public function getVisitor()
    {
        return $this->visitor;
    }

    /**
     * @param mixed $visitor
     */
    public function setVisitor(Visitors $visitor)
    {
        $this->visitor = $visitor;
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Favorites
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

