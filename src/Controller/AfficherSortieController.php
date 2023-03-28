<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AfficherSortieController extends AbstractController
{
    #[Route('/afficherSortie', name: 'app_afficherSortie')]
    public function index(): Response
    {
        return $this->render('afficher_sortie/afficherSortie.html.twig', [
            'controller_name' => 'AfficherSortieController',
        ]);
    }
}
