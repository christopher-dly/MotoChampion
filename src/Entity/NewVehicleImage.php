<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\VehicleImageRepository;

#[ORM\Entity(repositoryClass: VehicleImageRepository::class)]
class NewVehicleImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $image = null;
    
    #[ORM\ManyToOne(
        targetEntity: NewVehicle::class,
        inversedBy: "newVehicleImages",
        cascade: ["persist", "remove"]
    )]
    #[ORM\JoinColumn(nullable: false)]
    private ?NewVehicle $newVehicle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getNewVehicle(): ?NewVehicle
    {
        return $this->newVehicle;
    }

    public function setNewVehicle(?NewVehicle $newVehicle): self
    {
        $this->newVehicle = $newVehicle;
        return $this;
    }
}