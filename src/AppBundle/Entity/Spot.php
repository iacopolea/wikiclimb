<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Spot
 *
 * @ORM\Table(name="spots")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SpotRepository")
 */
class Spot
{
    public function __construct()
    {
        $this->climbings = new ArrayCollection();
    }

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
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="bolting", type="string", length=255, nullable=true)
     */
    private $bolting;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="rating", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $rating;

    /**
     * @var int
     *
     * @ORM\Column(name="altitude", type="integer", nullable=true)
     */
    private $altitude;

    /**
     * @var array
     *
     * @ORM\Column(name="face", type="array", nullable=true)
     */
    private $face;

    /**
     * @ORM\OneToMany(targetEntity="Climbing", mappedBy="spot")
     * @ORM\OrderBy({"positionNumber" = "ASC"})
     */
    private $climbings;

    /**
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="spots")
     * @ORM\JoinColumn()
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="Area", inversedBy="spots")
     * @ORM\JoinColumn()
     */
    private $area;

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
     * @return Spot
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
     * Set description
     *
     * @param string $description
     *
     * @return Spot
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
     * Set type
     *
     * @param string $type
     *
     * @return Spot
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
     * Set bolting
     *
     * @param string $bolting
     *
     * @return Spot
     */
    public function setBolting($bolting)
    {
        $this->bolting = $bolting;

        return $this;
    }

    /**
     * Get bolting
     *
     * @return string
     */
    public function getBolting()
    {
        return $this->bolting;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Spot
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
     * Set rating
     *
     * @param string $rating
     *
     * @return Spot
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set altitude
     *
     * @param integer $altitude
     *
     * @return Spot
     */
    public function setAltitude($altitude)
    {
        $this->altitude = $altitude;

        return $this;
    }

    /**
     * Get altitude
     *
     * @return int
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * Set face
     *
     * @param array $face
     *
     * @return Spot
     */
    public function setFace($face)
    {
        $this->face = $face;

        return $this;
    }

    /**
     * Get face
     *
     * @return array
     */
    public function getFace()
    {
        return $this->face;
    }

    /**
     * @return ArrayCollection|Climbing[]
     */
    public function getClimbings()
    {
        return $this->climbings;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param Area $area
     */
    public function setArea(Area $area)
    {
        $this->area = $area;
    }
}

