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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}
