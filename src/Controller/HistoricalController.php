<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HistoricalController extends AbstractController
{
    #[Route('/Historique', name: 'Historical')]
    public function index()
    {
        return $this->render('pages/construction.html.twig');
    }
}