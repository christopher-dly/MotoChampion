<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CyclepartRepository;

#[ORM\Entity(repositoryClass: CyclepartRepository::class)]
class CyclePart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    private ?string $casterAngle = null;

    #[ORM\Column]
    private ?string $caster = null;

    #[ORM\Column]
    private ?string $wheelbase = null;

    #[ORM\Column]
    private ?string $FrontSuspension = null;

    #[ORM\Column]
    private ?string $RearSuspension = null;

    #[ORM\Column]
    private ?string $Frontbrake = null;

    #[ORM\Column]
    private ?string $Rearbrake = null;

    #[ORM\Column]
    private ?string $FrontWheel = null;
    
    #[ORM\Column]
    private ?string $RearWheel = null;

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
        return $this->FrontSuspension;
    }

    /**
     * Set the value of FrontSuspension
     *
     * @return  self
     */ 
    public function setFrontSuspension($FrontSuspension)
    {
        $this->FrontSuspension = $FrontSuspension;

        return $this;
    }

    /**
     * Get the value of RearSuspension
     */ 
    public function getRearSuspension()
    {
        return $this->RearSuspension;
    }

    /**
     * Set the value of RearSuspension
     *
     * @return  self
     */ 
    public function setRearSuspension($RearSuspension)
    {
        $this->RearSuspension = $RearSuspension;

        return $this;
    }

    /**
     * Get the value of Frontbrake
     */ 
    public function getFrontbrake()
    {
        return $this->Frontbrake;
    }

    /**
     * Set the value of Frontbrake
     *
     * @return  self
     */ 
    public function setFrontbrake($Frontbrake)
    {
        $this->Frontbrake = $Frontbrake;

        return $this;
    }

    /**
     * Get the value of Rearbrake
     */ 
    public function getRearbrake()
    {
        return $this->Rearbrake;
    }

    /**
     * Set the value of Rearbrake
     *
     * @return  self
     */ 
    public function setRearbrake($Rearbrake)
    {
        $this->Rearbrake = $Rearbrake;

        return $this;
    }

    /**
     * Get the value of FrontWheel
     */ 
    public function getFrontWheel()
    {
        return $this->FrontWheel;
    }

    /**
     * Set the value of FrontWheel
     *
     * @return  self
     */ 
    public function setFrontWheel($FrontWheel)
    {
        $this->FrontWheel = $FrontWheel;

        return $this;
    }

    /**
     * Get the value of RearWheel
     */ 
    public function getRearWheel()
    {
        return $this->RearWheel;
    }

    /**
     * Set the value of RearWheel
     *
     * @return  self
     */ 
    public function setRearWheel($RearWheel)
    {
        $this->RearWheel = $RearWheel;

        return $this;
    }
}