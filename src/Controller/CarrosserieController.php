<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarrosserieController extends AbstractController
{
    #[Route('/carrosserie', name: 'app_carrosserie')]
    public function index(
        ServicesRepository $servicesRepository,
        HorairesRepository $horairesRepository
        ): Response
    {
        return $this->render('carrosserie/index.html.twig', [
            'controller_name' => 'CarrosserieController',
            'services' => $servicesRepository->findAll(),
            'horaires' => $horairesRepository->findAll()

        ]);
    }
}