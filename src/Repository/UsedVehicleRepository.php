<?php

namespace App\Repository;

use App\Entity\UsedVehicle;
use Doctrine\Persistence\ManagerRegistry;

class UsedVehicleRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, UsedVehicle::class);
    }
}