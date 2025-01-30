<?php

namespace App\Controller;

use App\Entity\UsedVehicle;
use App\form\NewUsedVehicleForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class UsedVehicleController extends AbstractController
{
    #[Route('/VehiculeOccasion', name: 'UsedVehicle')]
    public function index()
    {
        return $this->render('pages/usedVehicule.html.twig');
    }

    #[Route('/AdminVehiculeOccasion', name: 'AdminUsedVehicle', methods: ['GET'])]
    public function adminUsedVehicle()
    {
        return $this->render('admin/adminUsedVehicle.html.twig');
    }
    
    #[Route('/AdminNouveauxVehiculeOccasion', name: 'AdminNewUsedVehicle', methods: ['GET', 'POST'])]
    public function admiNewUsedVehicle(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger)
    {   
        $usedVehicle = new UsedVehicle();

        $form = $this->createForm(NewUsedVehicleForm::class, $usedVehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('imageUsedVehicle')->getData();

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
                $usedVehicle->setImageUsedVehicle('/uploads/' . $newFilename);
            }

            $entityManager->persist($usedVehicle);
            $entityManager->flush();

            $this->addFlash('success', 'Véhicule ajouté avec succès !');
            return $this->redirectToRoute('Home');
        }

        return $this->render('admin/adminNewUsedVehicle.html.twig', [
            'NewUsedVehicleForm' => $form->createView()
        ]);
    }

}