<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * comment
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
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
     * @ORM\OneToMany(targetEntity="Abuse", mappedBy="comment")
     */
    private $abuses;

    /**
     * @ORM\ManyToOne(targetEntity="Provider", inversedBy="comments")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */

    private  $provider;


    /**
     * @ORM\ManyToOne(targetEntity="Visitor", inversedBy="comments")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private  $visitor;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->abuses=new ArrayCollection();
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
    public function setVisitor(Visitor $visitor)
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
    public function setProvider(Provider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return ArrayCollection
     */
    public function getAbuses()
    {
        return $this->abuses;
    }

    /**
     * @param mixed $abuse
     */

    public function addAbuse(Abuse $abuse)
    {
        $this->abuses->add($abuse);
        // uncomment if you want to update other side
        //$abuses->setComment($this);
    }

    /**
     * @param mixed $abuse
     */
    public function removeAbuse(Abuse $abuse)
    {
        $this->abuses->removeElement($abuse);
        // uncomment if you want to update other side
        //$abuses->setComment(null);
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
     * @return Comment
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
     * @return Comment
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
     * @return Comment
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
     * @return Comment
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

