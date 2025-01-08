<?php

namespace App\Repository;

use App\Entity\TechnicalSheet;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class TechnicalSheetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, TechnicalSheet::class);
    }
}