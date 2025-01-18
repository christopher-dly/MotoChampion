<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TransmissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: TransmissionRepository::class)]
class Transmission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type:'text', length:255, nullable: true)]
    private ?string $primaryTransmission = null;

    #[ORM\Column(type:'text', length:255, nullable: true)]
    private ?string $secondaryTransmission = null;

    #[ORM\Column(type:'text', length:255, nullable: true)]
    private ?string $clutch = null;

    #[ORM\Column(type:'text', length:255, nullable: true)]
    private ?string $command = null;

    #[ORM\Column(type:'text', length:255, nullable: true)]
    private ?string $gearbox = null;

    #[ORM\OneToMany(
        targetEntity: "App\Entity\NewVehicle",
        mappedBy: "transmission",
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
        $newVehicle->setTransmission($this);

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
     * Get the value of gearbox
     */ 
    public function getGearbox()
    {
        return $this->gearbox;
    }

    /**
     * Set the value of gearbox
     *
     * @return  self
     */ 
    public function setGearbox($gearbox)
    {
        $this->gearbox = $gearbox;

        return $this;
    }


    /**
     * Get the value of clutch
     */ 
    public function getClutch()
    {
        return $this->clutch;
    }

    /**
     * Set the value of clutch
     *
     * @return  self
     */ 
    public function setClutch($clutch)
    {
        $this->clutch = $clutch;

        return $this;
    }

    /**
     * Get the value of command
     */ 
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set the value of command
     *
     * @return  self
     */ 
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get the value of primaryTransmission
     */ 
    public function getPrimaryTransmission()
    {
        return $this->primaryTransmission;
    }

    /**
     * Set the value of primaryTransmission
     *
     * @return  self
     */ 
    public function setPrimaryTransmission($primaryTransmission)
    {
        $this->primaryTransmission = $primaryTransmission;

        return $this;
    }

    /**
     * Get the value of secondaryTransmission
     */ 
    public function getSecondaryTransmission()
    {
        return $this->secondaryTransmission;
    }

    /**
     * Set the value of secondaryTransmission
     *
     * @return  self
     */ 
    public function setSecondaryTransmission($secondaryTransmission)
    {
        $this->secondaryTransmission = $secondaryTransmission;

        return $this;
    }
}
   