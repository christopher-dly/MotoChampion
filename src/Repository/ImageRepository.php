<?php

namespace App\Repository;

use App\Entity\Image;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class ActualityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Image::class);
    }
}