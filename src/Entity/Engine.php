<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EngineRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: EngineRepository::class)]
class Engine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    private ?string $type = null;

    #[ORM\Column]
    private ?string $cylinders = null;

    #[ORM\Column]
    private ?string $bore_x_stroke = null;
    
    #[ORM\Column]
    private ?string $volumetricRatio = null;
    
    #[ORM\Column]
    private ?string $announcedPower = null;

    #[ORM\Column]
    private ?string $coupleAnnounced = null;

    #[ORM\Column]
    private ?string $powerSupply = null;

    #[ORM\Column]
    private ?string $starter = null;

    #[ORM\Column]
    private ?string $consumption = null;

    #[ORM\Column]
    private ?string $co2Emissions = null;

    #[ORM\OneToMany(
        targetEntity: "App\Entity\TechnicalSheet",
        mappedBy: "engine",
        cascade: ["persist", "remove"]
    )]
    private ?array $technicalSheets = null;

    public function __construct()
    {
        $this->technicalSheets = new ArrayCollection();
    }

    /**
     * Get the value of technicalSheets
     */ 
    public function getTechnicalSheets()
    {
        return $this->technicalSheets;
    }

    /**
     * Add actuality
     *
     * @return self
     */ 
    public function addTechnicalSheet(TechnicalSheet $technicalSheet)
    {
        $this->technicalSheets[] = $technicalSheet;
        $technicalSheet->setEngine($this);

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
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of cylinders
     */ 
    public function getCylinders()
    {
        return $this->cylinders;
    }

    /**
     * Set the value of cylinders
     *
     * @return  self
     */ 
    public function setCylinders($cylinders)
    {
        $this->cylinders = $cylinders;

        return $this;
    }

    /**
     * Get the value of bore_x_stroke
     */ 
    public function getBore_x_stroke()
    {
        return $this->bore_x_stroke;
    }

    /**
     * Set the value of bore_x_stroke
     *
     * @return  self
     */ 
    public function setBore_x_stroke($bore_x_stroke)
    {
        $this->bore_x_stroke = $bore_x_stroke;

        return $this;
    }

    /**
     * Get the value of volumetricRatio
     */ 
    public function getVolumetricRatio()
    {
        return $this->volumetricRatio;
    }

    /**
     * Set the value of volumetricRatio
     *
     * @return  self
     */ 
    public function setVolumetricRatio($volumetricRatio)
    {
        $this->volumetricRatio = $volumetricRatio;

        return $this;
    }

    /**
     * Get the value of announcedPower
     */ 
    public function getAnnouncedPower()
    {
        return $this->announcedPower;
    }

    /**
     * Set the value of announcedPower
     *
     * @return  self
     */ 
    public function setAnnouncedPower($announcedPower)
    {
        $this->announcedPower = $announcedPower;

        return $this;
    }

    /**
     * Get the value of coupleAnnounced
     */ 
    public function getCoupleAnnounced()
    {
        return $this->coupleAnnounced;
    }

    /**
     * Set the value of coupleAnnounced
     *
     * @return  self
     */ 
    public function setCoupleAnnounced($coupleAnnounced)
    {
        $this->coupleAnnounced = $coupleAnnounced;

        return $this;
    }

    /**
     * Get the value of powerSupply
     */ 
    public function getPowerSupply()
    {
        return $this->powerSupply;
    }

    /**
     * Set the value of powerSupply
     *
     * @return  self
     */ 
    public function setPowerSupply($powerSupply)
    {
        $this->powerSupply = $powerSupply;

        return $this;
    }

    /**
     * Get the value of starter
     */ 
    public function getStarter()
    {
        return $this->starter;
    }

    /**
     * Set the value of starter
     *
     * @return  self
     */ 
    public function setStarter($starter)
    {
        $this->starter = $starter;

        return $this;
    }

    /**
     * Get the value of consumption
     */ 
    public function getConsumption()
    {
        return $this->consumption;
    }

    /**
     * Set the value of consumption
     *
     * @return  self
     */ 
    public function setConsumption($consumption)
    {
        $this->consumption = $consumption;

        return $this;
    }

    /**
     * Get the value of co2Emissions
     */ 
    public function getCo2Emissions()
    {
        return $this->co2Emissions;
    }

    /**
     * Set the value of co2Emissions
     *
     * @return  self
     */ 
    public function setCo2Emissions($co2Emissions)
    {
        $this->co2Emissions = $co2Emissions;

        return $this;
    }
}