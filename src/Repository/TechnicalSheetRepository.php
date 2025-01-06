<?php

namespace App\Repository;

use App\Entity\TechnicalSheet;
use Doctrine\Persistence\ManagerRegistry;

class TechnicalSheetRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, TechnicalSheet::class);
    }
}