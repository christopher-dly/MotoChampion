<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsedVehicleRepository;

#[ORM\Entity(repositoryClass: UsedVehicleRepository::class)]
class UsedVehicle
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
    private ?string $color = null;

    #[ORM\Column]
    private ?string $image = null;

    #[ORM\Column]
    private ?string $year = null;

    #[ORM\Column]
    private ?string $kilometers = null;

    #[ORM\Column]
    private ?string $miles = null;

    #[ORM\Column]
    private ?string $taxPower = null;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of brand
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
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
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

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
     * Get the value of year
     */ 
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of kilometers
     */ 
    public function getKilometers()
    {
        return $this->kilometers;
    }

    /**
     * Set the value of kilometers
     *
     * @return  self
     */ 
    public function setKilometers($kilometers)
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    /**
     * Get the value of miles
     */             
    public function getMiles()
    {
        return $this->miles;
    }

    /**
     * Set the value of miles
     *
     * @return  self
     */ 
    public function setMiles($miles)
    {
        $this->miles = $miles;

        return $this;
    }

    /**
     * Get the value of taxPower
     */ 
    public function getTaxPower()
    {
        return $this->taxPower;
    }

    /**
     * Set the value of taxPower
     *
     * @return  self
     */ 
    public function setTaxPower($taxPower)
    {
        $this->taxPower = $taxPower;

        return $this;
    }
}

 