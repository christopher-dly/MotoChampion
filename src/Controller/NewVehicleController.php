<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewVehicleController extends AbstractController
{
    #[Route('/VehiculeNeuf', name: 'NewVehicule')]
    public function index()
    {
        return $this->render('pages/newVehicle.html.twig');
    }
}