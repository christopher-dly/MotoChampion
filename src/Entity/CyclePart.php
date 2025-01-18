<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CyclepartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: CyclepartRepository::class)]
class CyclePart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $casterAngle = null;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $caster = null;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $wheelbase = null;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $rim = null;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $frame = null;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $frontSuspension = null;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $rearSuspension = null;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $frontbrake = null;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $rearbrake = null;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $frontWheel = null;
    
    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private ?string $rearWheel = null;

    #[ORM\OneToMany(
        targetEntity: "App\Entity\NewVehicle",
        mappedBy: "cyclePart",
        cascade: ["persist", "remove"]
    )]
    private ?Collection $NewVehicles = null;

    public function __construct()
    {
        $this->NewVehicles = new ArrayCollection();
    }

    /**
     * Get the value of technicalSheets
     */ 
    public function getNewVehicles()
    {
        return $this->NewVehicles;
    }

    /**
     * Add actuality
     *
     * @return self
     */ 
    public function addNewVehicle(NewVehicle $newVehicle)
    {
        $this->NewVehicles[] = $newVehicle;
        $newVehicle->setCyclePart($this);

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
     * Get the value of casterAngle
     */ 
    public function getCasterAngle()
    {
        return $this->casterAngle;
    }

    /**
     * Set the value of casterAngle
     *
     * @return  self
     */ 
    public function setCasterAngle($casterAngle)
    {
        $this->casterAngle = $casterAngle;

        return $this;
    }

    /**
     * Get the value of caster
     */ 
    public function getCaster()
    {
        return $this->caster;
    }

    /**
     * Set the value of caster
     *
     * @return  self
     */ 
    public function setCaster($caster)
    {
        $this->caster = $caster;

        return $this;
    }

    /**
     * Get the value of wheelbase
     */ 
    public function getWheelbase()
    {
        return $this->wheelbase;
    }

    /**
     * Set the value of wheelbase
     *
     * @return  self
     */ 
    public function setWheelbase($wheelbase)
    {
        $this->wheelbase = $wheelbase;

        return $this;
    }

    /**
     * Get the value of FrontSuspension
     */ 
    public function getFrontSuspension()
    {
        return $this->frontSuspension;
    }

    /**
     * Set the value of FrontSuspension
     *
     * @return  self
     */ 
    public function setFrontSuspension($frontSuspension)
    {
        $this->frontSuspension = $frontSuspension;

        return $this;
    }

    /**
     * Get the value of RearSuspension
     */ 
    public function getRearSuspension()
    {
        return $this->rearSuspension;
    }

    /**
     * Set the value of RearSuspension
     *
     * @return  self
     */ 
    public function setRearSuspension($rearSuspension)
    {
        $this->rearSuspension = $rearSuspension;

        return $this;
    }

    /**
     * Get the value of Frontbrake
     */ 
    public function getFrontbrake()
    {
        return $this->frontbrake;
    }

    /**
     * Set the value of Frontbrake
     *
     * @return  self
     */ 
    public function setFrontbrake($frontbrake)
    {
        $this->frontbrake = $frontbrake;

        return $this;
    }

    /**
     * Get the value of Rearbrake
     */ 
    public function getRearbrake()
    {
        return $this->rearbrake;
    }

    /**
     * Set the value of Rearbrake
     *
     * @return  self
     */ 
    public function setRearbrake($rearbrake)
    {
        $this->rearbrake = $rearbrake;

        return $this;
    }

    /**
     * Get the value of FrontWheel
     */ 
    public function getFrontWheel()
    {
        return $this->frontWheel;
    }

    /**
     * Set the value of FrontWheel
     *
     * @return  self
     */ 
    public function setFrontWheel($frontWheel)
    {
        $this->frontWheel = $frontWheel;

        return $this;
    }

    /**
     * Get the value of RearWheel
     */ 
    public function getRearWheel()
    {
        return $this->rearWheel;
    }

    /**
     * Set the value of RearWheel
     *
     * @return  self
     */ 
    public function setRearWheel($rearWheel)
    {
        $this->rearWheel = $rearWheel;

        return $this;
    }

    /**
     * Get the value of rim
     */ 
    public function getRim()
    {
        return $this->rim;
    }

    /**
     * Set the value of rim
     *
     * @return  self
     */ 
    public function setRim($rim)
    {
        $this->rim = $rim;

        return $this;
    }

    /**
     * Get the value of frame
     */ 
    public function getFrame()
    {
        return $this->frame;
    }

    /**
     * Set the value of frame
     *
     * @return  self
     */ 
    public function setFrame($frame)
    {
        $this->frame = $frame;

        return $this;
    }
}