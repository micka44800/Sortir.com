<?php

namespace App\Controller;

use App\Form\Model\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
//    $search = new propertySearch();
    #[Route('/accueil', name: 'app_accueil')]
    public function home(SortieRepository $repository)
    {
        $propertySearch =  new PropertySearch(); $sortie = $repository->findAll();
        $form = $this->createForm(PropertySearchType::class,$propertySearch);
        return $this->render('main/accueil.html.twig',['form'=>$form,
            'SortieA' => $sortie,]);
    }


}
