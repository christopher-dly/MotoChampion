<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TechnicalSheetRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: TechnicalSheetRepository::class)]
class TechnicalSheet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\ManyToOne(
        targetEntity: CyclePart::class,
        inversedBy: "technicalSheets"
    )]
    private $cyclePart = null;
    
    #[ORM\ManyToOne(
        targetEntity: Dimension::class,
        inversedBy: "technicalSheets"
    )]
    private $dimension = null;

    #[ORM\ManyToOne(
        targetEntity: Engine::class,
        inversedBy: "technicalSheets"
    )]
    private $engine = null;

    #[ORM\ManyToOne(
        targetEntity: Image::class,
        inversedBy: "technicalSheets"
    )]
    private $image = null;

    #[ORM\ManyToOne(
        targetEntity: Information::class,
        inversedBy: "technicalSheets"
    )]
    private $information = null;

    #[ORM\ManyToOne(
        targetEntity: Transmission::class,
        inversedBy: "technicalSheets"
    )]
    private $transmission = null;

    #[ORM\OneToMany(
        targetEntity: "App\Entity\NewVehicle",
        mappedBy: "technicalSheet",
        cascade: ["persist", "remove"]
    )]
    private $newVehicle;

    public function __construct()
    {
        $this->newVehicle = new ArrayCollection();
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of cyclePart
     */ 
    public function getCyclePart()
    {
        return $this->cyclePart;
    }

    /**
     * Set the value of cyclePart
     *
     * @return  self
     */ 
    public function setCyclePart($cyclePart)
    {
        $this->cyclePart = $cyclePart;

        return $this;
    }

    /**
     * Get the value of dimension
     */ 
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * Set the value of dimension
     *
     * @return  self
     */ 
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * Get the value of engine
     */ 
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set the value of engine
     *
     * @return  self
     */ 
    public function setEngine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of information
     */ 
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set the value of information
     *
     * @return  self
     */ 
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get the value of transmission
     */ 
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Set the value of transmission
     *
     * @return  self
     */ 
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get the value of newVehicle
     */ 
    public function getNewVehicle()
    {
        return $this->newVehicle;
    }

    /**
     * Set the value of newVehicle
     *
     * @return  self
     */ 
    public function setNewVehicle($newVehicle)
    {
        $this->newVehicle = $newVehicle;

        return $this;
    }
}