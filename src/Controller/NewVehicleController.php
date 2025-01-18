<?php

namespace App\Controller;

use App\Entity\CyclePart;
use App\Entity\Dimension;
use App\Entity\Engine;
use App\Entity\Information;
use App\Entity\NewVehicle;
use App\Entity\Transmission;
use App\Form\CompleteVehicleForm;
use App\Form\CyclePartForm;
use App\Form\DimensionForm;
use App\Form\EngineForm;
use App\Form\InformationForm;
use App\Form\NewVehicleForm;
use App\Form\TransmissionForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
            // Doctrine va persister toutes les entités associées grâce aux relations
            $entityManager->persist($newVehicle);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('admin/adminNewNewVehicle.html.twig', [
            'NewVehicleForm' => $form->createView(),
        ]);
    }
}

// namespace App\Controller;

// use App\Entity\CyclePart;
// use App\Entity\Dimension;
// use App\Entity\Engine;
// use App\Entity\NewVehicle;
// use App\Entity\Transmission;
// use App\Form\CyclePartForm;
// use App\Form\DimensionForm;
// use App\Form\EngineForm;
// use App\Form\NewVehicleForm;
// use App\Form\TransmissionForm;
// use App\Repository\NewVehicleRepository;
// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Routing\Annotation\Route;

// class NewVehicleController extends AbstractController
// {

    
//     #[Route('/AdminNouveauVehiculeNeuf', name: 'AdminNewNewVehicule', methods: ['GET', 'POST'])]
//     public function adminNewVehicule(Request $req, NewVehicleRepository $newVehicleRepository)
//     {
//         $newVehicle = new NewVehicle();
//         $form = $this->createForm(NewVehicleForm::class, $newVehicle);
//         $form->handleRequest($req);
//         if ($form->isSubmitted() && $form->isValid()) {
//             $name = $form->get('name');

//             $newVehicleRepository->saveNewVehicle($newVehicle);
//             return $this->redirectToRoute('AdminNewEngine');
//         }
//         return $this->render('admin/adminNewNewVehicle.html.twig', [
//             'NewVehicleForm' => $form->createView()
//         ]);

//     }
    
//     #[Route('/AdminNouveauVehiculeNeuf/Moteur', name: 'AdminNewEngine', methods: ['GET', 'POST'])]
//     public function adminNewEngine(Request $req, NewVehicleRepository $newVehicleRepository)
//     {
//         $engine = new Engine();
//         $form = $this->createForm(EngineForm::class, $engine);
//         $form->handleRequest($req);
//         if ($form->isSubmitted() && $form->isValid()) {
//             $type = $form->get('type');
//             $cylinders = $form->get('cylinders');
//             $bore_x_stroke = $form->get('bore_x_stroke');
//             $volumetricRatio = $form->get('volumetricRatio');
//             $announcedPower = $form->get('announcedPower');
//             $coupleAnnounced = $form->get('coupleAnnounced');
//             $powerSupply = $form->get('powerSupply');
//             $starter = $form->get('starter');
//             $consumption = $form->get('consumption');
//             $co2Emissions = $form->get('co2Emissions');

//             $newVehicleRepository->saveEngine($engine);
//             return $this->redirectToRoute('AdminNewDimension');
//         }
//         return $this->render('admin/adminNewEngine.html.twig', [
//             'EngineForm' => $form->createView()
//         ]);
//     }

//     #[Route('/AdminNouveauVehiculeNeuf/Dimension', name: 'AdminNewDimension', methods: ['GET', 'POST'])]
//     public function adminNewDimension(Request $req, NewVehicleRepository $newVehicleRepository)
//     {
//         $dimension = new Dimension();
//         $form = $this->createForm(DimensionForm::class, $dimension);
//         $form->handleRequest($req);
//         if ($form->isSubmitted() && $form->isValid()) {
//             $width = $form->get('width');
//             $length = $form->get('length');
//             $height = $form->get('height');
//             $saddleHeight = $form->get('saddleHeight');
//             $groundClearance = $form->get('groundClearance');
//             $gas = $form->get('gas');
//             $oil = $form->get('oil');
//             $weight = $form->get('weight');

//             $newVehicleRepository->saveDimension($dimension);
//             return $this->redirectToRoute('AdminNewCyclePart');
//         }
//         return $this->render('admin/adminNewDimension.html.twig', [
//             'DimensionForm' => $form->createView()
//         ]);
//     }
    
//     #[Route('/AdminNouveauVehiculeNeuf/CyclePart', name: 'AdminNewCyclePart', methods: ['GET', 'POST'])]
//     public function adminNewCyclePart(Request $req, NewVehicleRepository $newVehicleRepository)
//     {
//         $cyclePart = new CyclePart();
//         $form = $this->createForm(CyclePartForm::class, $cyclePart);
//         $form->handleRequest($req);
//         if ($form->isSubmitted() && $form->isValid()) {
//             $casterAngle = $form->get('casterAngle');
//             $caster = $form->get('caster');
//             $wheelbase = $form->get('wheelbase');
//             $rim = $form->get('rim');
//             $frame = $form->get('frame');
//             $frontSuspension = $form->get('frontSuspension');
//             $rearSuspension = $form->get('rearSuspension');
//             $frontbrake = $form->get('frontbrake');
//             $rearbrake = $form->get('rearbrake');
//             $frontWheel = $form->get('frontWheel');
//             $rearWheel = $form->get('rearWheel');

//             $newVehicleRepository->saveCyclePart($cyclePart);
//             return $this->redirectToRoute('AdminNewTransmission');
//         }
//         return $this->render('admin/adminNewCyclePart.html.twig', [
//             'CyclePartForm' => $form->createView()
//         ]);
//     }

//     #[Route('/AdminNouveauVehiculeNeuf/Transmission', name: 'AdminNewTransmission', methods: ['GET', 'POST'])]
//     public function adminNewTransmission(Request $req, NewVehicleRepository $newVehicleRepository)
//     {
//         $transmission = new Transmission();
//         $form = $this->createForm(TransmissionForm::class, $transmission);
//         $form->handleRequest($req);
//         if ($form->isSubmitted() && $form->isValid()) {
//             $primary = $form->get('primary');
//             $secondary = $form->get('secondary');
//             $clutch = $form->get('clutch');
//             $command = $form->get('command');
//             $gearbox = $form->get('gearbox');

//             $newVehicleRepository->saveTransmission($transmission);
//             return $this->redirectToRoute('home');
//         }
//         return $this->render('admin/adminNewTransmission.html.twig', [
//             'TransmissionForm' => $form->createView()
//         ]);
//     }
// }
