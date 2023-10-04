<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use App\Repository\ServicesRepository;
use App\Repository\SousServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MecaniqueController extends AbstractController
{
    #[Route('/mecanique', name: 'app_mecanique')]
    public function index(
        HorairesRepository $horairesRepository,
        ServicesRepository $servicesRepository,
        SousServicesRepository $sousServicesRepository
    ): Response
    {
        return $this->render('mecanique/index.html.twig', [
            'controller_name' => 'MecaniqueController',
            'horaires' => $horairesRepository->findAll(),
            'services'=> $servicesRepository->findAll(),
            'sousServices'=> $sousServicesRepository->findAll()

        ]);
    }
}