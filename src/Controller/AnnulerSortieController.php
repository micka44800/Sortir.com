<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnulerSortieController extends AbstractController
{
    #[Route('/annulerSortie', name: 'app_annulerSortie')]
    public function index(): Response
    {
        return $this->render('annuler_sortie/annulerSortie.html.twig', [
            'controller_name' => 'AnnulerSortieController',
        ]);
    }
}
