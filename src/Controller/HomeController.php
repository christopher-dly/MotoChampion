<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'Home')]
    public function index()
    {
        return $this->render('pages/index.html.twig');
    }

    #[Route('/legalMention', name: 'legalMention')]
    public function legalMention()
    {
        return $this->render('pages/legalMention.html.twig');
    }
}