<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WorkshopController extends AbstractController
{
    #[Route('/Atelier', name: 'WorkShop')]
    public function index()
    {
        return $this->render('pages/construction.html.twig');
    }
}