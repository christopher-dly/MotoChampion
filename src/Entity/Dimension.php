<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DimensionRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: DimensionRepository::class)]
class Dimension
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    private ?string $WxlxH = null;

    #[ORM\Column]
    private ?string $saddleHeight = null;

    #[ORM\Column]
    private ?string $groundClearance = null;

    #[ORM\Column]
    private ?string $gas = null;

    #[ORM\Column]
    private ?string $weight = null;

    #[ORM\OneToMany(
        targetEntity: "App\Entity\TechnicalSheet",
        mappedBy: "dimension",
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
        $technicalSheet->setDimension($this);

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
     * Get the value of WxlxH
     */ 
    public function getWxlxH()
    {
        return $this->WxlxH;
    }

    /**
     * Set the value of WxlxH
     *
     * @return  self
     */ 
    public function setWxlxH($WxlxH)
    {
        $this->WxlxH = $WxlxH;

        return $this;
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
}
