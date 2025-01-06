<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TechnicalSheetRepository;

#[ORM\Entity(repositoryClass: TechnicalSheetRepository::class)]
class TechnicalSheet
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