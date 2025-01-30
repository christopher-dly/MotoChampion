<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

Class AdminController extends AbstractController
{
    #[Route('/AdminAccueil', name: 'AdminHome')]
    public function index()
    {
        return $this->render('admin/adminHome.html.twig');
    }
}