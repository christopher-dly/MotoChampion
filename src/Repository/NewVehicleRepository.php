<?php

namespace App\Repository;

use App\Entity\NewVehicle;
use Doctrine\Persistence\ManagerRegistry;

class NewVehicleRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, NewVehicle::class);
    }
}   