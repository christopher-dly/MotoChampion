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
    public function index(ActualityRepository $actualityRepository)
    {
        $actualities = $actualityRepository->findAll();
        return $this->render('pages/actuality.html.twig', [
            'actualities' => $actualities,
        ]);
    }

    #[Route('/AdminNouvelleActualité', name: 'AdminNewActuality', methods: ['GET', 'POST'])]
    public function admin(Request $req, ActualityRepository $actualityRepository)
    {
        $actuality = new Actuality();

        $form = $this->createForm(NewActualityForm ::class, $actuality);

        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $actualityRepository->saveNewActuality($actuality);
            return $this->redirectToRoute('AdminHome');
        }

        return $this->render('admin/adminNewActuality.html.twig', [
            'ActualityForm' => $form->createView(),
          ]);
    }
}