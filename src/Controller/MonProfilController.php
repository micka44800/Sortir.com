<?php

namespace App\Controller ;

use App\Entity\User;
use App\Form\MonProfilFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MonProfilController extends AbstractController
{
    #[Route('/monProfil', name: "app_monProfil")]
    public function monProfil(Request $request){

        $user = new User();
        $form = $this->createForm(MonProfilFormType::class, $user);
        $form->handleRequest($request);

        return $this->render('profil/monProfil.html.twig', [
            'formMonProfil' => $form->createView(),
        ]);
    }

}