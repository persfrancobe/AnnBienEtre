<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Newsletters
 *
 * @ORM\Table(name="newsletters")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NewslettersRepository")
 */
class Newsletters
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="pdf", type="blob")
     */
    private $pdf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publication", type="date")
     */
    private $publication;

    /**
     *
     */


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
     * Set title
     *
     * @param string $title
     *
     * @return Newsletters
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set pdf
     *
     * @param string $pdf
     *
     * @return Newsletters
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get pdf
     *
     * @return string
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * Set publication
     *
     * @param \DateTime $publication
     *
     * @return Newsletters
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \DateTime
     */
    public function getPublication()
    {
        return $this->publication;
    }
}

