<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * Visitor
 *
 * @ORM\Table(name="visitors")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VisitorRepository")
 */
class Visitor extends User
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var bool
     *
     * @ORM\Column(name="Newsletter", type="boolean")
     */
    private $newsletter;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Abuse", mappedBy="visitor")
     */
    private $abuses;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="visitor")
     */
    private $comments;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Favorite", mappedBy="visitor")
     */
    private $favorites;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Note", mappedBy="visitor")
     */
    private $notes;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Position",mappedBy="visitor")
     */
    protected $positions;


    /**
     * Constructor
     */
    public function __construct(){

        parent:: __construct();
        $this->abuses=new ArrayCollection();
        $this->comments=new ArrayCollection();
        $this->favorites=new ArrayCollection();
        $this->addRole(User::ROLE_VISITOR);
    }

    /**
     * @param mixed $position
     */
    public function addPosition(Position $position)
    {
        $this->positions->add($position);
        // uncomment if you want to update other side
        //$positions->setVisitor($this);
    }

    /**
     * @param mixed $position
     */
    public function removePosition(Position $position)
    {
        $this->positions->removeElement($position);
        // uncomment if you want to update other side
        //$positions->setVisitor(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getPositions()
    {
        return $this->positions;
    }



    /**
     * @param mixed $note
     */
    public function addNote(Note $note)
    {
        $this->notes->add($note);
        // uncomment if you want to update other side
        //$notes->setVisitor($this);
    }

    /**
     * @param mixed $note
     */
    public function removeNote(Note $note)
    {
        $this->notes->removeElement($note);
        // uncomment if you want to update other side
        //$notes->setVisitor(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $favorite
     */
    public function addFavorite(Favorite $favorite)
    {
        $this->favorites->add($favorite);
        // uncomment if you want to update other side
        //$favorites->setVisitor($this);
    }

    /**
     * @param mixed $favorite
     */
    public function removeFavorite(Favorite $favorite)
    {
        $this->favorites->removeElement($favorite);
        // uncomment if you want to update other side
        //$favorites->setVisitor(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getFavorites()
    {
        return $this->favorites;
    }


    /**
     * @param mixed $comment
     */
    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);
        // uncomment if you want to update other side
        //$comments->setVisitor($this);
    }

    /**
     * @param mixed $comment
     */
    public function removeComment(Comment $comment)
    {
        $this->comments->removeElement($comment);
        // uncomment if you want to update other side
        //$comments->setVisitor(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $abuse
     */
    public function addAbuse(Abuse $abuse)
    {
        $this->abuses->add($abuse);
        // uncomment if you want to update other side
        //$abuses->setVisitor($this);
    }

    /**
     * @param mixed $abuse
     */
    public function removeAbuse(Abuse $abuse)
    {
        $this->abuses->removeElement($abuse);
        // uncomment if you want to update other side
        //$abuses->setVisitor(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getAbuses()
    {
        return $this->abuses;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Visitor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Visitor
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     *
     * @return Visitor
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return bool
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }
}

