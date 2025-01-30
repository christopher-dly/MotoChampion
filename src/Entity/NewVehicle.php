<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NewVehicleRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: NewVehicleRepository::class)]
class NewVehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50, nullable: false)]
    #[Assert\NotBlank(message: "Le nom du véhicule est obligatoire.")]
    #[Assert\Length(max: 50, maxMessage: "Le nom ne doit pas dépasser 50 caractères.")]
    private ?string $name = null;
    
    #[ORM\Column(type: 'string', nullable: true)]
    #[Assert\Length(max: 255, maxMessage: "Le chemin de l'image ne doit pas dépasser 255 caractères.")]
    private ?string $image = null;

    #[ORM\ManyToOne(
        targetEntity: CyclePart::class,
        inversedBy: "newVehicles",
        cascade: ["persist", "remove"]
    )]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?CyclePart $cyclePart = null;
    
    #[ORM\ManyToOne(
        targetEntity: Dimension::class,
        inversedBy: "newVehicles",
        cascade: ["persist", "remove"]
        )]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Dimension $dimension = null;

    #[ORM\ManyToOne(
        targetEntity: Engine::class,
        inversedBy: "newVehicles",
        cascade: ["persist", "remove"]
    )]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Engine $engine = null;

    #[ORM\ManyToOne(
        targetEntity: Information::class,
        inversedBy: "newVehicles",
        cascade: ["persist", "remove"]
    )]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Information $information = null;

    #[ORM\ManyToOne(
        targetEntity: Transmission::class,
        inversedBy: "newVehicles",
        cascade: ["persist", "remove"]
    )]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Transmission $transmission = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName(?string $name): self
    {
        $this->name = $name;
    
        return $this;
    }    

    public function getCyclePart()
    {
        return $this->cyclePart;
    }

    public function setCyclePart($cyclePart)
    {
        $this->cyclePart = $cyclePart;

        return $this;
    }

    public function getDimension()
    {
        return $this->dimension;
    }

    public function setDimension($dimension)
    {
        $this->dimension = $dimension;

        return $this;
    }

    public function getEngine()
    {
        return $this->engine;
    }

    public function setEngine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

    public function getInformation()
    {
        return $this->information;
    }

    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    public function getTransmission()
    {
        return $this->transmission;
    }

    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
