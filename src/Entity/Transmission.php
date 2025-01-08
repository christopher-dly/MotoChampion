<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TransmissionRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: TransmissionRepository::class)]
class Transmission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    private ?string $gearbox = null;

    #[ORM\OneToMany(
        targetEntity: "App\Entity\TechnicalSheet",
        mappedBy: "transmission",
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
        $technicalSheet->setTransmission($this);

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
}
   