<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Climbing
 *
 * @ORM\Table(name="climbings")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClimbingRepository")
 */
class Climbing
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="position_number", type="integer", nullable=true, unique=true)
     */
    private $positionNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="grade", type="string", length=255, nullable=true)
     */
    private $grade;

    /**
     * @var string
     *
     * @ORM\Column(name="min_grade", type="string", length=255, nullable=true)
     */
    private $minGrade;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="ranking", type="decimal", precision=5, scale=4, nullable=true)
     */
    private $ranking;

    /**
     * @var int
     *
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $length;

    /**
     * @var array
     *
     * @ORM\Column(name="pitches", type="array", nullable=true)
     */
    private $pitches;

    /**
     * @var string
     *
     * @ORM\Column(name="sketch_image", type="string", length=255, nullable=true)
     */
    private $sketchImage;

    /**
     * @var string
     *
     * @ORM\Column(name="featured_image", type="string", length=255, nullable=true)
     */
    private $featuredImage;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Spot", inversedBy="climbings")
     * @ORM\JoinColumn(nullable=true)
     */
    private $spot;

    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(nullable=true)
     */
    private $location;

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
     * Set name
     *
     * @param string $name
     *
     * @return Climbing
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
     * Set positionNumber
     *
     * @param integer $positionNumber
     *
     * @return Climbing
     */
    public function setPositionNumber($positionNumber)
    {
        $this->positionNumber = $positionNumber;

        return $this;
    }

    /**
     * Get positionNumber
     *
     * @return int
     */
    public function getPositionNumber()
    {
        return $this->positionNumber;
    }

    /**
     * Set grade
     *
     * @param string $grade
     *
     * @return Climbing
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set minGrade
     *
     * @param string $minGrade
     *
     * @return Climbing
     */
    public function setMinGrade($minGrade)
    {
        $this->minGrade = $minGrade;

        return $this;
    }

    /**
     * Get minGrade
     *
     * @return string
     */
    public function getMinGrade()
    {
        return $this->minGrade;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Climbing
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Climbing
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set ranking
     *
     * @param string $ranking
     *
     * @return Climbing
     */
    public function setRanking($ranking)
    {
        $this->ranking = $ranking;

        return $this;
    }

    /**
     * Get ranking
     *
     * @return string
     */
    public function getRanking()
    {
        return $this->ranking;
    }

    /**
     * Set length
     *
     * @param integer $length
     *
     * @return Climbing
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set pitches
     *
     * @param array $pitches
     *
     * @return Climbing
     */
    public function setPitches($pitches)
    {
        $this->pitches = $pitches;

        return $this;
    }

    /**
     * Get pitches
     *
     * @return array
     */
    public function getPitches()
    {
        return $this->pitches;
    }

    /**
     * Set sketchImage
     *
     * @param string $sketchImage
     *
     * @return Climbing
     */
    public function setSketchImage($sketchImage)
    {
        $this->sketchImage = $sketchImage;

        return $this;
    }

    /**
     * Get sketchImage
     *
     * @return string
     */
    public function getSketchImage()
    {
        return $this->sketchImage;
    }

    /**
     * Set featuredImage
     *
     * @param string $featuredImage
     *
     * @return Climbing
     */
    public function setFeaturedImage($featuredImage)
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

    /**
     * Get featuredImage
     *
     * @return string
     */
    public function getFeaturedImage()
    {
        return $this->featuredImage;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Climbing
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
     * @return mixed
     */
    public function getSpot()
    {
        return $this->spot;
    }

    /**
     * @param mixed $spot
     */
    public function setSpot(Spot $spot)
    {
        $this->spot = $spot;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

}

