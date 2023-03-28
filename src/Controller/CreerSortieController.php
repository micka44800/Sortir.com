<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreerSortieController extends AbstractController
{
    #[Route('/creerSortie', name: 'app_creerSortie')]
    public function index(): Response
    {
        return $this->render('creer_sortie/creerSortie.html.twig', [
            'controller_name' => 'creerSortieController',
        ]);
    }
}
