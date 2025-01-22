<?php

namespace App\Controller;

use App\Entity\NewVehicle;
use App\Form\NewVehicleForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewVehicleController extends AbstractController
{
    #[Route('/VehiculeNeuf', name: 'NewVehicule')]
    public function index()
    {
        return $this->render('pages/newVehicle.html.twig');
    }

    #[Route('/AdminNouveauVehiculeNeuf', name: 'AdminNewNewVehicle', methods: ['GET', 'POST'])]
    public function adminNewVehicle(Request $request, EntityManagerInterface $entityManager): Response 
    {
        $newVehicle = new NewVehicle(); // L'entité principale
    
        // Formulaire global avec les sous-formulaires
        $form = $this->createForm(NewVehicleForm::class, $newVehicle);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $newFilename = uniqid('vehicle_', true) . '.' . $imageFile->guessExtension();
    
                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
        
                    // Sauvegarder le chemin en base de données
                    $newVehicle->setImage($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors de l\'upload du fichier.');
                }
            }
    
            $entityManager->persist($newVehicle);
            $entityManager->flush();
    
            return $this->redirectToRoute('Home');

        } else {
            $this->addFlash('error', 'Le formulaire n\'est pas valide.');
        }
    
        // Ajout du retour de la vue pour éviter l'erreur
        return $this->render('admin/adminNewNewVehicle.html.twig', [
            'NewVehicleForm' => $form->createView(),
        ]);
    }
    
}