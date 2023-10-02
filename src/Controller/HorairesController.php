<?php

namespace App\Controller;

use Twig\Template;
use App\Repository\HorairesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HorairesController extends AbstractController
{
    #[Route('/horaires', name: 'app_horaires')]

    public function index(HorairesRepository $horairesRepository): Response
    {

        $horaires = $horairesRepository->findAll();
        
        return $this->render('horaires/index.html.twig', [
            'horaires'=>$horaires,
        ]);
    }
}