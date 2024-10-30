<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('pages/home/index.html.twig', [
            'controller_name' => 'HomeController',
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