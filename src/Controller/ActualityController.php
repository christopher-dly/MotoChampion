<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Form\NewActualityForm;
use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ActualityController extends AbstractController
{
    #[Route('/Actualité', name: 'Actuality')]
    public function index()
    {
        return $this->render('pages/actuality.html.twig');
    }

    #[Route('/AdminActualité', name: 'AdminActuality', methods: ['GET', 'POST'])]
    public function admin(Request $req, ActualityRepository $actualityRepository)
    {
        $actuality = new Actuality();

        $form = $this->createForm(NewActualityForm ::class, $actuality);

        $form->handleRequest($req);

        
        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form->get('name');
            $title = $form->get('title');
            $content = $form->get('content');
            $image = $form->get('image');
            
            $actualityRepository->saveNewActuality($actuality);
            return $this->redirectToRoute('Home');
        }

        return $this->render('admin/adminActuality.html.twig', [
            'ActualityForm' => $form->createView(),
          ]);
    }
}