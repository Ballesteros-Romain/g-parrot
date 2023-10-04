<?php

namespace App\Controller;

use App\Repository\AvisRepository;
use App\Repository\HorairesRepository;
use App\Repository\ServicesRepository;
use App\Repository\SousServicesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_')]
    public function index(AvisRepository $avisRepository,
        HorairesRepository $horairesRepository,
        ServicesRepository $servicesRepository,
        SousServicesRepository $sousServicesRepository
        ): Response
    {

        $avis = $avisRepository->findAll();

       
        

        return $this->render('home/index.html.twig', [
            'avis' => $avis,
            'horaires' => $horairesRepository->findAll(),
            'services' => $servicesRepository->findAll(),
            'sousServices'=> $sousServicesRepository->findAll()

        ]);
        
            // return $this->render('home/index.html.twig', [
            // 'controller_name' => 'HomeController',
            // ]);
        
    }
}