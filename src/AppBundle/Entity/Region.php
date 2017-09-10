<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="regions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RegionRepository")
 */
class Region
{

    function __construct(){
        $this->areas = new ArrayCollection();
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
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="regions")
     * @ORM\JoinColumn()
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $country;

    /**
     * @ORM\ManyToMany(targetEntity="Area", mappedBy="regions")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $areas;

    /**
     * @ORM\OneToMany(targetEntity="Location", mappedBy="region")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $locations;


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
     * @return Region
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
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Country $country
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;
    }

    /**
     * @return ArrayCollection | Area[]
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * Get location
     *
     * @return ArrayCollection|Location[]
     */
    public function getLocation()
    {
        return $this->locations;
    }
}

