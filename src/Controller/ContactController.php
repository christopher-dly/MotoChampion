<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/Contact', name: 'Contact')]
    public function index()
    {
        return $this->render('pages/contact.html.twig');
    }
}