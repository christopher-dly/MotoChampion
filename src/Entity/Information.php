<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\InformationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: InformationRepository::class)]
class Information
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'text', length: 255)]
    private ?string $brand = null;

    #[ORM\Column(type: 'text', length: 255)]
    private ?string $model = null;

    #[ORM\Column(type: 'text', length: 255)]
    private ?string $category = null;

    #[ORM\Column(type: 'integer')]
    private ?int $cylinders = null;

    #[ORM\Column(type: 'integer')]
    private ?int $price = null;

    #[ORM\Column(type: 'text', length: 255)]
    private ?string $warrantyTime = null;

    #[ORM\Column(type: 'text', length: 5000)]
    private ?string $description = null;

    #[ORM\Column(type: 'boolean')]
    private ?bool $availableForTrial = false;

    #[ORM\Column(type: 'json')]
    private ?array $license = null;
    
    #[ORM\OneToMany(
        targetEntity: "App\Entity\NewVehicle",
        mappedBy: "information",
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
        $newVehicle->setInformation($this);

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
     * Get the value of mark
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of mark
     *
     * @return  self
     */ 
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of warrantyTime
     */ 
    public function getWarrantyTime()
    {
        return $this->warrantyTime;
    }

    /**
     * Set the value of warrantyTime
     *
     * @return  self
     */ 
    public function setWarrantyTime($warrantyTime)
    {
        $this->warrantyTime = $warrantyTime;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of availableForTrial
     */ 
    public function getAvailableForTrial()
    {
        return $this->availableForTrial;
    }

    /**
     * Set the value of availableForTrial
     *
     * @return  self
     */ 
    public function setAvailableForTrial($availableForTrial)
    {
        $this->availableForTrial = $availableForTrial;

        return $this;
    }

    /**
     * Get the value of license
     */ 
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Set the value of license
     *
     * @return  self
     */ 
    public function setLicense($license)
    {
        $this->license = $license;

        return $this;
    }
}