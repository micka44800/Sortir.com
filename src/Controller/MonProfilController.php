<?php

namespace App\Controller ;

use App\Entity\User;
use App\Form\MonProfilFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonProfilController extends AbstractController
{
    #[Route('/monProfil/{id}', name: "app_monProfil")]
    public function monProfil(Request $request, int $id, UserRepository $userRepository, EntityManagerInterface $entityManager): Response {

        $user = $userRepository->find($id);
        $monProfilForm = $this->createForm(MonProfilFormType::class, $user);
        $monProfilForm->handleRequest($request);
        if($monProfilForm->isSubmitted() && $monProfilForm->isValid()) {
            $entityManager->flush();
        }


        return $this->render('profil/monProfil.html.twig', [
            'formMonProfil' => $monProfilForm,
        ]);
    }

}