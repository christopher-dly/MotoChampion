<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccessoriesController extends AbstractController
{
    #[Route('/Accessoires', name: 'Accessories')]
    public function index()
    {
        return $this->render('pages/construction.html.twig');
    }
}