<?php

namespace App\Controller;

use App\Repository\AvisRepository;
use App\Repository\HorairesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_')]
    public function index(AvisRepository $avisRepository, HorairesRepository $horairesRepository): Response
    {

        $avis = $avisRepository->findAll();


        return $this->render('home/index.html.twig', [
            'avis' => $avis,
            'horaires' => $horairesRepository->findAll()


        ]);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}