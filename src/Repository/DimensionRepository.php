<?php

namespace App\Repository;

use App\Entity\Dimension;
use Doctrine\Persistence\ManagerRegistry;

class DimensionRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Dimension::class);
    }
}