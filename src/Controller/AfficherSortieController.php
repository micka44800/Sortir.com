<?php

namespace App\Controller;

use App\Form\InscriptionType;
use App\Form\Model\propertySearch;
use App\Form\PropertySearchType;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AfficherSortieController extends AbstractController
{
    #[Route('/afficherSortie', name: 'app_afficherSortie')]
    public function index( EntityManagerInterface $entityManager, SortieRepository $repository, Request $request): Response
    {
        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class,$search);
        $form->handleRequest($request);
        $sortie = $repository->findAll();
        return $this->render('afficher_sortie/afficherSortie.html.twig', [
            'SortieA' => $sortie,
            'form'    =>$form->createView()
        ]);
    }
    #[Route('/inscription/{id}', name: 'app_inscriptionSortie')]
    public function inscription(int $id, EntityManagerInterface $entityManager, SortieRepository $repository, Request $request): Response
    {

        $inscrit = $this->getUser();
        $sortie = $repository->find($id);
    $sortie->addParticipant($inscrit);
    if ($this->getUser())
            $entityManager->persist($sortie);
            $entityManager->flush();


        return $this->redirectToRoute('app_afficherSortie');
    }

}
