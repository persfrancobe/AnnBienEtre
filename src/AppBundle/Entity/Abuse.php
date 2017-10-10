<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Abuse
 *
 * @ORM\Table(name="abuses")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\abuseRepository")
 */
class Abuse
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="encoding", type="date")
     */
    private $encoding;

    /**
     * @ORM\ManyToOne(targetEntity="Visitor", inversedBy="abuses")
     */
    private  $visitor;

    /**
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="abuses")
     */
    private  $comment;


    /**
     * Constructor
     */
    public function __construct()
    {
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;
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
     * Set description
     *
     * @param string $description
     *
     * @return Abuse
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set encoding
     *
     * @param \DateTime $encoding
     *
     * @return Abuse
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
}

