<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UsedVehicleController extends AbstractController
{
    #[Route('/VehiculeOccasion', name: 'UsedVehicle')]
    public function index()
    {
        return $this->render('pages/usedVehicule.html.twig');
    }
}