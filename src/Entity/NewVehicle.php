<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NewVehicleRepository;

#[ORM\Entity(repositoryClass: NewVehicleRepository::class)]
class NewVehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\ManyToOne(
    targetEntity: TechnicalSheet::class,
    inversedBy: "newVehicles",
    )]
    private $technicalSheet;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of ficheTechnique
     */ 
    public function getFicheTechnique()
    {
        return $this->technicalSheet;
    }

    /**
     * Set the value of ficheTechnique
     *
     * @return  self
     */ 
    public function setFicheTechnique($technicalSheet)
    {
        $this->technicalSheet = $technicalSheet;

        return $this;
    }
}
