<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, User::class);
    }
}