<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="locations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocationRepository")
 */
class Location
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
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="approach", type="text", nullable=true)
     */
    private $approach;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="sketch_image", type="string", length=255, nullable=true)
     */
    private $sketchImage;

    /**
     * @ORM\ManyToOne(targetEntity="Area", inversedBy="locations")
     * @ORM\JoinColumn()
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $area;

    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="locations")
     * @ORM\JoinColumn()
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity="Spot", mappedBy="location")
     */
    private $spots;

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
     * @return Location
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
     * @return Location
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
     * Set rating
     *
     * @param string $rating
     *
     * @return Location
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
     * Set approach
     *
     * @param string $approach
     *
     * @return Location
     */
    public function setApproach($approach)
    {
        $this->approach = $approach;

        return $this;
    }

    /**
     * Get approach
     *
     * @return string
     */
    public function getApproach()
    {
        return $this->approach;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Location
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set sketchImage
     *
     * @param string $sketchImage
     *
     * @return Location
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

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param Region $region
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;
    }


}

