<?php

namespace App\Repository;

use App\Entity\Actuality;
use Doctrine\Persistence\ManagerRegistry;

class ActualityRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Actuality::class);
    }
}