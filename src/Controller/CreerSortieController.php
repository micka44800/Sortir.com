<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Sortie;
use App\Entity\User;
use App\Form\CreerSortieType;
use App\Repository\EtatRepository;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class CreerSortieController extends AbstractController
{

    #[Route('/creerSortie', name: 'app_creerSortie')]
    public function index(Request $request,EntityManagerInterface $entityManager,SortieRepository $sortieRepository,#[CurrentUser] $user,EtatRepository $etatRepository): Response
    {
        $entity = new Sortie();
        $entity->setOrganisateur($user);

        $form = $this->createForm(CreerSortieType::class, $entity);
        $form->handleRequest($request);
        dump($entity);

        if($form->isSubmitted() && $form->isValid()){

            $entity->setSite($this->getUser()->getSite());
            $entity->setSituation($etatRepository->findOneBy(['libelle'=>'Crée']));


            $entityManager->persist($entity);
            $entityManager->flush();
        }
        return $this->render('creer_sortie/creerSortie.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}

