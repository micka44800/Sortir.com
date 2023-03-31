<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Entity\User;
use App\Form\InscriptionType;
use App\Repository\SortieRepository;
use App\Repository\UserRepository;
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
    #[Route('/inscription/{id}', name: 'app_inscriptionSortie')]
    public function inscription(int $id, EntityManagerInterface $entityManager, SortieRepository $repository, Request $request): Response
    {

        $inscrit = $this->getUser();
        $sortie = $repository->find($id);
    $sortie->addParticipant($inscrit);
            $entityManager->persist($sortie);
            $entityManager->flush();


        return $this->redirectToRoute('app_afficherSortie');
    }

}
