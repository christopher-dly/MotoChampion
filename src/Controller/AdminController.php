<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\User;
use App\Form\LoginAdminForm;
use App\Form\NewAdminForm;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\Security\Model\Authenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

Class AdminController extends AbstractController
{
    #[Route('/AdminAccueil', name: 'AdminHome')]
    public function index()
    {
        return $this->render('admin/adminHome.html.twig');
    }

    #[Route('/AdminAjouter', name: 'AdminNew', methods: ['GET', 'POST'])]
    public function inscription(
        Request $request,
        UserRepository $repository,
        UserPasswordHasherInterface $passwordHasher
      ) {
        // 1. Crée une nouvelle instance de la classe `User`
        $user = new User();
    
        // 2. Création du formulaire
        $form = $this->createForm(NewAdminForm::class, $user);
    
        // 3. Iriguer les formulaire avec les données de la requête
        $form->handleRequest($request);
    
        // 4. Si le formulaire est soumis et valide 
        if ($form->isSubmitted() && $form->isValid()) {
    
          // 4.1. Hasher le mot de passe avant de l'enregistrer dans la base de données
          $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $user->getPassword()
          );
    
          // 4.2. Mettre à jour le mot de passe avec la version hashée
          $user->setPassword($hashedPassword);
    
          // 4.3. Enregistrer l'utilisateur dans la base de données
          $repository->save($user, true);
    
          // 4.4. Rediriger l'utilisateur vers la page de connexion
          return $this->redirectToRoute('AdminHome');
        }
    
        // 5. Affiche la vue de l'inscription avec le formulaire
        return $this->render('admin/adminNewAdmin.html.twig', [
          'registrationForm' => $form->createView(),
        ]);
      }

    #[Route('/LoginAdmin', name: 'LoginAdmin', methods: ['GET', 'POST'])]
    public function login(Request $request, AuthenticationUtils $authenticationUtils) {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastEmail = $authenticationUtils->getLastUsername();
    
        return $this->render('pages/loginAdmin.html.twig', [
          'last_email' => $lastEmail,
          'error' => $error,
          
        ]);
      }

    #[Route('/logout', name: 'logout')]
    public function logout()
    {

    }
}