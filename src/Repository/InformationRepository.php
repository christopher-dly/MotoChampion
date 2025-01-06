<?php

namespace App\Repository;

use App\Entity\Information;
use Doctrine\Persistence\ManagerRegistry;

class InformationRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Information::class);
    }
}