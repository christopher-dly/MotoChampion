<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class ConnectController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    #[Route('/adminconnect', name: 'adminconnect', methods: ['GET'])]
    public function adminconnect()
    {
        return $this->render('connect/adminconnect.html.twig');
    }
}

