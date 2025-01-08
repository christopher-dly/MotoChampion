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

    #[ORM\OneToOne(
    targetEntity: "App\Entity\TechnicalSheet",
    mappedBy: "newVehicle",
    cascade: ["persist", "remove"]
    )]
    private $ficheTechnique;

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
        return $this->ficheTechnique;
    }

    /**
     * Set the value of ficheTechnique
     *
     * @return  self
     */ 
    public function setFicheTechnique($ficheTechnique)
    {
        $this->ficheTechnique = $ficheTechnique;

        return $this;
    }
}
