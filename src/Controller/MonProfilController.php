<?php

namespace App\Controller ;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MonProfilController extends AbstractController
{
    #[Route('/monProfil', name: "app_monProfil")]
    public function monProfil(){
        return $this->render('profil/monProfil.html.twig');
    }
}