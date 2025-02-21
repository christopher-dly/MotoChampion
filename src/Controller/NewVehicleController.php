<?php

namespace App\Controller;

use App\Entity\NewVehicle;
use App\Form\EditNewVehicleForm;
use App\Form\NewVehicleForm;
use App\Repository\InformationRepository;
use App\Repository\NewVehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class NewVehicleController extends AbstractController
{
    #[Route('/VehiculeNeuf', name: 'NewVehicle')]
    public function newVehicle(InformationRepository $informationRepository)
    {   
        $newVehicleTrails = $informationRepository->findBy(['category' => 'Trail']);
        $newVehicleSports = $informationRepository->findBy(['category' => 'Sport / GT']);
        $newVehicleRoadsters = $informationRepository->findBy(['category' => 'Roadster']);
        $newVehicleScooters = $informationRepository->findBy(['category' => 'Scooter']);
        $newVehicleMoto125s = $informationRepository->findBy(['category' => 'Moto 125']);

        return $this->render('pages/newVehicle.html.twig', [
            'newVehicleTrails' => $newVehicleTrails,
            'newVehicleSports' => $newVehicleSports,
            'newVehicleRoadsters' => $newVehicleRoadsters,
            'newVehicleScooters' => $newVehicleScooters,
            'newVehicleMoto125s' => $newVehicleMoto125s,
        ]);
    }

    #[Route('/VehiculeNeuf/{id}', name: 'DetailNewVehicle')]
    public function detailNewVehicle(NewVehicle $newVehicle)
    {
        return $this->render('pages/newVehicleDetail.html.twig', [
            'newVehicle' => $newVehicle
        ]);
    }

    #[Route('/AdminVehiculeNeuf', name: 'AdminNewVehicle')]
    public function adminNewVehicle(InformationRepository $informationRepository)
    {
        $newVehicleTrails = $informationRepository->findBy(['category' => 'Trail']);  //Récuperer les véhicules de la catégorie Trail et stock dans une variable
        $newVehicleSports = $informationRepository->findBy(['category' => 'Sport / GT']);  //Récuperer les véhicules de la catégorie Sport / GT et stock dans une variable
        $newVehicleRoadsters = $informationRepository->findBy(['category' => 'Roadster']);  //Récuperer les véhicules de la catégorie Roadster et stock dans une variable
        $newVehicleScooters = $informationRepository->findBy(['category' => 'Scooter']);  //Récuperer les véhicules de la catégorie Scooter et stock dans une variable
        $newVehicleMoto125s = $informationRepository->findBy(['category' => 'Moto 125']);  //Récuperer les véhicules de la catégorie Moto 125 et stock dans une variable

        return $this->render('admin/adminNewVehicle.html.twig', [  //affiche la page et fait passer les variables dans la page
            'newVehicleTrails' => $newVehicleTrails,  
            'newVehicleSports' => $newVehicleSports,
            'newVehicleRoadsters' => $newVehicleRoadsters,
            'newVehicleScooters' => $newVehicleScooters,
            'newVehicleMoto125s' => $newVehicleMoto125s,
        ]);
    }
 
    #[Route('/AdminNouveauVehiculeNeuf', name: 'AdminNewNewVehicle', methods: ['GET', 'POST'])]
    public function adminNewNewVehicle(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response 
    {
        $newVehicle = new NewVehicle(); //Création d'une nouvelle instance de la classe NewVehicle
        
        $form = $this->createForm(NewVehicleForm::class, $newVehicle);  //Création d'un formulaire NewVehicleForm
        $form->handleRequest($request);  //Iriguer le formulaire avec les données de la requête
    
        if ($form->isSubmitted() && $form->isValid()) {  //Si le formulaire est soumis et valide

            foreach ($form->getData() as $key => $value) { //Pour chaque donnée du formulaire vas vérifier si c'est une chaîne de caractères
                if (is_string($value)) {                //Si c'est une chaîne de caractères vas supprimer les espaces en début et fin
                    $setter = 'set' . ucfirst($key);    //Mettre en majuscule la première lettre du nom de la variable
                    if (method_exists($newVehicle, $setter)) {
                        $newVehicle->$setter(trim($value));
                    }
                }
            }
            
            $image = $form->get('image')->getData();  //Récupère l'image du formulaire
            if ($image) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);  //Récupère le nom de fichier original de l'image
                $safeFilename = $slugger->slug($originalFilename);  //Convertit le nom de fichier original en un nom de fichier sûr
                $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();  //Ajoute un identifiant unique à la fin du nom de fichier

                try {  //Essai de déplacer l'image dans le dossier uploads
                    $image->move(
                        $this->getParameter('kernel.project_dir').'/public/uploads',
                        $newFilename
                    );
                } catch (FileException $e) {        //Si une erreur survient
                    $this->addFlash('error', 'An error occurred while uploading the image.');
                    return $this->render('admin/adminNewNewVehicle.html.twig', [  //Affiche la page de nouveau véhicule avec le formulaire
                        'NewVehicleForm' => $form->createView(),
                    ]);
                }
                $newVehicle->setImage('/uploads/' . $newFilename);  //Mettre l'image dans la variable
            }
    
            $entityManager->persist($newVehicle);  //Enregistrer l'objet dans la base de données
            $entityManager->flush();  //Flush la base de données
    
            $this->addFlash('success', 'Véhicule ajouté avec succès !');
            return $this->redirectToRoute('AdminNewVehicle');
        }
    
        return $this->render('admin/adminNewNewVehicle.html.twig', [
            'NewVehicleForm' => $form->createView(),  //Affiche la page de nouveau véhicule avec le formulaire
        ]);
    }
    
    #[Route('/AdminVehiculeNeuf/delete/{id}', name: 'DeleteAdminNewVehicle', methods: ['POST'])]
    public function deleteNewVehicle(Request $request, NewVehicle $newVehicle, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newVehicle->getId(), $request->request->get('_token'))) {  //Si le token est valide
            $entityManager->remove($newVehicle);  //Supprimer l'objet de la base de données
            $entityManager->flush();  //Flush la base de données
        }

        return $this->redirectToRoute('AdminNewVehicle');
    }

    #[Route('AdminVehiculeNeuf/{id}', name: 'EditAdminNewVehicle', methods: ['GET', 'POST'])]
    public function editNewVehicle(Request $request, NewVehicle $newVehicle, EntityManagerInterface $entityManager)
    {   
        $form = $this->createForm(EditNewVehicleForm::class, $newVehicle);        //Création d'un formulaire EditNewVehicleForm
        $form->handleRequest($request);  //Iriguer le formulaire avec les données de la requête
    
        if ($form->isSubmitted() && $form->isValid()) {  //Si le formulaire est soumis et valide
            $entityManager->flush();  //ici, pas de persist car on n'envoie pas de nouvelle données 
    
            $this->addFlash('success', 'Véhicule modifié avec succès !');
    
            return $this->redirectToRoute('AdminNewVehicle');
        }
    
        return $this->render('admin/adminNewVehicleEdit.html.twig', [        //Affiche la page de modification de véhicule avec le formulaire
            'newVehicle' => $newVehicle,        
            'EditNewVehicleForm' => $form->createView(),
        ]);
    }

}