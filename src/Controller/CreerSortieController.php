<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\CreerSortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreerSortieController extends AbstractController
{
    #[Route('/creerSortie', name: 'app_creerSortie')]
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        $entity = new Sortie();
        $form = $this->createForm(CreerSortieType::class, $entity);
        $form->handleRequest($request);
        return $this->render('creer_sortie/creerSortie.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}

