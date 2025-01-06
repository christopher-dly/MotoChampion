<?php

namespace App\Repository;

use App\Entity\Transmission;
use Doctrine\Persistence\ManagerRegistry;

class TransmissionRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Transmission::class);
    }
}