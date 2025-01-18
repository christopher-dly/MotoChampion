<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NewVehicleRepository;

#[ORM\Entity(repositoryClass: NewVehicleRepository::class)]
class NewVehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name;

    #[ORM\ManyToOne(
        targetEntity: CyclePart::class,
        inversedBy: "NewVehicle",
        cascade: ["persist", "remove"]
    )]
    private $cyclePart = null;
    
    #[ORM\ManyToOne(
        targetEntity: Dimension::class,
        inversedBy: "NewVehicle",
        cascade: ["persist", "remove"]
    )]
    private $dimension = null;

    #[ORM\ManyToOne(
        targetEntity: Engine::class,
        inversedBy: "NewVehicle",
        cascade: ["persist", "remove"]
    )]
    private $engine = null;

    #[ORM\ManyToOne(
        targetEntity: Information::class,
        inversedBy: "NewVehicle",
        cascade: ["persist", "remove"]
    )]
    private $information = null;

    #[ORM\ManyToOne(
        targetEntity: Transmission::class,
        inversedBy: "NewVehicle",
        cascade: ["persist", "remove"]
    )]
    private $transmission = null;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
}
