<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\User;
use App\Form\ContactType;
use App\Form\UserType;
use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends AbstractController
{
    #[Route('/auth', name: 'app_signup')]
    public function index(Request $req, UserRepository $repo, UserPasswordHasherInterface $paswordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            // Verifier si l'utilisateur existe
            $userInDB = $repo->findUserByEmail($user->getEmail());

            if ($userInDB) {
                return $this->render('pages/auth/index.html.twig', [
                    "inscriptionForm" => $form,
                    "message" => "Vous êtes deja membre, connectez-vous!"
                ]);
            }
            $hashedPassword = $paswordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);
            $repo->save($user, true);
        }

        return $this->render('pages/auth/index.html.twig', [
            "inscriptionForm" => $form
        ]);
    }
}

// Exercice:
// 1. Créer le Hero avec image et présentation.
// 2. Créer un Formulaire avec: email, message (Avec Validation)
// 3. Afficher le formulaire dans la page d'Accueil.
// 4. Créer une Entité et son Repository et faites une migration
// 5. Créer une route pour traiter le formulaire.
// 6. Enregistrer les données la BD.