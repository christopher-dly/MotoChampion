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
use Symfony\Component\String\Slugger\SluggerInterface;

class NewVehicleController extends AbstractController
{
    #[Route('/VehiculeNeuf', name: 'NewVehicule')]
    public function index()
    {
        return $this->render('pages/newVehicle.html.twig');
    }

    #[Route('/AdminNouveauVehiculeNeuf', name: 'AdminNewNewVehicle', methods: ['GET', 'POST'])]
    public function adminNewVehicle(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response 
    {
        $newVehicle = new NewVehicle();
        
        $form = $this->createForm(NewVehicleForm::class, $newVehicle);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            
            $image = $form->get('image')->getData();

            if ($image) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();

                try {
                    $image->move(
                        $this->getParameter('kernel.project_dir').'/public/uploads',
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'An error occurred while uploading the image.');
                    return $this->render('admin/adminNewNewVehicle.html.twig', [
                        'NewVehicleForm' => $form->createView(),
                    ]);
                }
                $newVehicle->setImage('/uploads/' . $newFilename);
            }
    
            $entityManager->persist($newVehicle);
            $entityManager->flush();
    
            $this->addFlash('success', 'Véhicule ajouté avec succès !');
            return $this->redirectToRoute('Home');
        }
    
        return $this->render('admin/adminNewNewVehicle.html.twig', [
            'NewVehicleForm' => $form->createView(),
        ]);
    }
    
    
}