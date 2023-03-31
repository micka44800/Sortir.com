<?php

namespace App\Controller;
use App\Form\ProfilType;
use App\Repository\UserRepository;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
  //  #[Route('/profil', name: "app_profil")]
   // public function monProfil(Request $request,EntityManagerInterface $entityManager) : Response{
     //   $user = new user ();
       //$form = $this->createForm(ProfilType::class, $user);
      // $form->handleRequest($request);
       // return $this->render('profil/profil.html.twig',['' => $form->createView()]);
   // }


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