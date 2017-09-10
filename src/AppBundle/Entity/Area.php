<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 *
 * @ORM\Table(name="areas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AreaRepository")
 */
class Area
{
    function __construct(){
        $this->regions = new ArrayCollection();
        $this->locations = new ArrayCollection();
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
     * @ORM\ManyToMany(targetEntity="Region", inversedBy="areas")
     */
    private $regions;

    /**
     * @ORM\OneToMany(targetEntity="Location", mappedBy="area")
     */
    private $locations;

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
     * @return Area
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
     * @return Area
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
     * Get location
     *
     * @return ArrayCollection|Location[]
     */
    public function getLocations()
    {
        return $this->locations;
    }


    /**
     * @return ArrayCollection|Region[]
     */
    public function getRegions()
    {
        return $this->regions;
    }


    public function addRegion(Region $region)
    {
        if ($this->regions->contains($region)) {
            return;
        }
        $this->regions[] = $region;
    }

    public function removeRegion(Region $region)
    {
        $this->regions->removeElement($region);
    }
}

