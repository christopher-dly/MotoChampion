<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\InformationRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: InformationRepository::class)]
class Information
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    private ?string $brand = null;

    #[ORM\Column]
    private ?string $model = null;

    #[ORM\Column]
    private ?string $category = null;

    #[ORM\Column]
    private ?string $cylinders = null;

    #[ORM\Column]
    private ?string $price = null;

    #[ORM\Column]
    private ?string $warrantyTime = null;

    #[ORM\Column]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $availableForTrial = false;

    #[ORM\Column]
    private ?string $license = null;
    
    #[ORM\OneToMany(
        targetEntity: "App\Entity\TechnicalSheet",
        mappedBy: "information",
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
        $technicalSheet->setInformation($this);

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
    public function getMark()
    {
        return $this->brand;
    }

    /**
     * Set the value of mark
     *
     * @return  self
     */ 
    public function setMark($mark)
    {
        $this->brand = $mark;

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