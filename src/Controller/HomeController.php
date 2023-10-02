<?php

namespace App\Controller;

use App\Repository\AvisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_')]
    public function index(AvisRepository $avisRepository): Response
    {

        $avis = $avisRepository->findAll();
        // $context = compact('avis');
        // $context['avis'] = $avis;

        return $this->render('home/index.html.twig', [
            'avis' => $avis
        ]);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}