<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DimensionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: DimensionRepository::class)]
class Dimension
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $length = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $width = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $height = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?string $saddleHeight = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?string $groundClearance = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?string $gas = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?string $oil = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?string $weight = null;

    #[ORM\OneToMany(
        targetEntity: "App\Entity\NewVehicle",
        mappedBy: "dimension",
        cascade: ["persist", "remove"]
    )]
    private ?Collection $newVehicles = null;

    public function __construct()
    {
        $this->newVehicles = new ArrayCollection();
    }

    /**
     * Get the value of NewVehicles
     */ 
    public function getNewVehicles()
    {
        return $this->newVehicles;
    }

    /**
     * Add actuality
     *
     * @return self
     */ 
    public function addNewVehicle(NewVehicle $newVehicle)
    {
        $this->newVehicles[] = $newVehicle;
        $newVehicle->setDimension($this);

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of saddleHeight
     */ 
    public function getSaddleHeight()
    {
        return $this->saddleHeight;
    }

    /**
     * Set the value of saddleHeight
     *
     * @return  self
     */ 
    public function setSaddleHeight($saddleHeight)
    {
        $this->saddleHeight = $saddleHeight;

        return $this;
    }

    /**
     * Get the value of groundClearance
     */ 
    public function getGroundClearance()
    {
        return $this->groundClearance;
    }

    /**
     * Set the value of groundClearance
     *
     * @return  self
     */ 
    public function setGroundClearance($groundClearance)
    {
        $this->groundClearance = $groundClearance;

        return $this;
    }

    /**
     * Get the value of gas
     */ 
    public function getGas()
    {
        return $this->gas;
    }

    /**
     * Set the value of gas
     *
     * @return  self
     */ 
    public function setGas($gas)
    {
        $this->gas = $gas;

        return $this;
    }

    /**
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of oil
     */ 
    public function getOil()
    {
        return $this->oil;
    }

    /**
     * Set the value of oil
     *
     * @return  self
     */ 
    public function setOil($oil)
    {
        $this->oil = $oil;

        return $this;
    }

    /**
     * Get the value of length
     */ 
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set the value of length
     *
     * @return  self
     */ 
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get the value of width
     */ 
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @return  self
     */ 
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of height
     */ 
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the value of height
     *
     * @return  self
     */ 
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }
}
