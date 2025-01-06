<?php

namespace App\Repository;

use App\Entity\CyclePart;
use Doctrine\Persistence\ManagerRegistry;

class CyclePartRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, CyclePart::class);
    }
}