<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * Visitors
 *
 * @ORM\Table(name="visitors")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VisitorsRepository")
 */
class Visitors extends Users
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
     * @var Images
     * @ORM\OneToOne(targetEntity="Images")
     */
    private $image;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Abuses", mappedBy="visitors")
     */
    private $abuse;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="visitors")
     */
    private $comment;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Favorites", mappedBy="visitors")
     */
    private $favorite;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Notes", mappedBy="visitors")
     */
    private $note;


    /**
     * Constructor
     */
    public function __construct(){

        parent:: __construct();
        $this->user_type=Users::TYPE_VISITOR;
        $this->abuse=new ArrayCollection();
        $this->comment=new ArrayCollection();
        $this->favorite=new ArrayCollection();
        $this->addRole('role_visitor');
    }

    /**
     * @param mixed $note
     */
    public function addNote(Notes $note)
    {
        $this->note->add($note);
        // uncomment if you want to update other side
        //$note->setVisitor($this);
    }

    /**
     * @param mixed $note
     */
    public function removeNote(Notes $note)
    {
        $this->note->removeElement($note);
        // uncomment if you want to update other side
        //$note->setVisitor(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $favorite
     */
    public function addFavorite(Favorites $favorite)
    {
        $this->favorite->add($favorite);
        // uncomment if you want to update other side
        //$favorite->setVisitor($this);
    }

    /**
     * @param mixed $favorite
     */
    public function removeFavorite(Favorites $favorite)
    {
        $this->favorite->removeElement($favorite);
        // uncomment if you want to update other side
        //$favorite->setVisitor(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getFavorite()
    {
        return $this->favorite;
    }


    /**
     * @param mixed $comment
     */
    public function addComment(Comments $comment)
    {
        $this->comment->add($comment);
        // uncomment if you want to update other side
        //$comment->setVisitor($this);
    }

    /**
     * @param mixed $comment
     */
    public function removeComment(Comments $comment)
    {
        $this->comment->removeElement($comment);
        // uncomment if you want to update other side
        //$comment->setVisitor(null);
    }


    /**
     * @return ArrayCollection
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $abuse
     */
    public function addAbuse(Abuses $abuse)
    {
        $this->abuse->add($abuse);
        // uncomment if you want to update other side
        //$abuse->setVisitor($this);
    }

    /**
     * @param mixed $abuse
     */
    public function removeAbuse(Abuses $abuse)
    {
        $this->abuse->removeElement($abuse);
        // uncomment if you want to update other side
        //$abuse->setVisitor(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getAbuse()
    {
        return $this->abuse;
    }


    /**
     * @return Images
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Images $image
     */
    public function setImage(Images $image)
    {
        $this->image = $image;
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Visitors
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
     * @return Visitors
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
     * @return Visitors
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

