<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewVehicleController extends AbstractController
{
    #[Route('/VehiculeNeuf', name: 'newVehicule')]
    public function index()
    {
        return $this->render('pages/newVehicule.html.twig');
    }
}