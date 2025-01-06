<?php

namespace App\Repository;

use App\Entity\Engine;
use Doctrine\Persistence\ManagerRegistry;

class EngineRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Engine::class);
    }
}