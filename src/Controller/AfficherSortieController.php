<?php

namespace App\Controller;

use App\Form\InscriptionType;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AfficherSortieController extends AbstractController
{
    #[Route('/afficherSortie', name: 'app_afficherSortie')]
    public function index( EntityManagerInterface $entityManager, SortieRepository $repository, Request $request): Response
    {

        $sortie = $repository->findAll();


        return $this->render('afficher_sortie/afficherSortie.html.twig', [
            'SortieA' => $sortie,
        ]);
    }
}
