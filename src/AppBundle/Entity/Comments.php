<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentsRepository")
 */
class Comments
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
     * @var \DateTime
     *
     * @ORM\Column(name="encoding", type="date")
     */
    private $encoding;

    /**
     * @var int
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Abuses", mappedBy="comments")
     */
    private $abuse;

    /**
     * @ORM\ManyToOne(targetEntity="Providers", inversedBy="comments")
     */

    private  $provider;


    /**
     * @ORM\ManyToOne(targetEntity="Visitors", inversedBy="comments")
     */
    private  $visitor;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->abuse=new ArrayCollection();
        $this->encoding=new DateTime();
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
     * @return ArrayCollection
     */
    public function getAbuse()
    {
        return $this->abuse;
    }

    /**
     * @param mixed $abuse
     */

    public function addAbuse(Abuses $abuse)
    {
        $this->abuse->add($abuse);
        // uncomment if you want to update other side
        //$abuse->setComment($this);
    }

    /**
     * @param mixed $abuse
     */
    public function removeAbuse(Abuses $abuse)
    {
        $this->abuse->removeElement($abuse);
        // uncomment if you want to update other side
        //$abuse->setComment(null);
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
     * Set title
     *
     * @param string $title
     *
     * @return Comments
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
     * Set encoding
     *
     * @param \DateTime $encoding
     *
     * @return Comments
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;

        return $this;
    }

    /**
     * Get encoding
     *
     * @return \DateTime
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return Comments
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comments
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}

