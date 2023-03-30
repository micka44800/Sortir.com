<?php

namespace App\Controller;

use App\Form\ModifierSortieType;
use App\Repository\SortieRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifierSortieController extends AbstractController
{
    #[Route('/modifier/{id}', name: 'app_modifier_sortie')]
    public function index(int $id, SortieRepository $repository, EntityManagerInterface $entityManager, Request $request): Response
    {
        $sortie = $repository->find($id);
        $sortieForm = $this->createForm(ModifierSortieType::class, $sortie);
        $sortieForm->handleRequest($request);
        if($sortieForm->isSubmitted() && $sortieForm->isValid()){
            $entityManager->flush();
        }
      /*  $sortie->setNom('');
        $sortie->setDateHeureDebut();
        $sortie->setDateLimiteInscription();
        $sortie->setNbInscriptionsMax();
        $sortie->setDuree();
        $sortie->setInfosSortie();
        $sortie->setSite();
        $sortie->setLieu();*/

        return $this->render('modifier_sortie/modifierSortie.html.twig', [
            'sortie' => $sortieForm,
        ]);
    }

    #[Route('/profil/{id}', name: 'app_profil_details')]
    public function details(int $id, UserRepository $userRepository):Response
    {

        $user = $userRepository->find($id);
        if (!$user){
            throw $this->createNotFoundException('User does not exist');

        }
        return $this->render('profil/profil.html.twig',
            [

                'profilForm'=>$user
            ]);

    }
}
