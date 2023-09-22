<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SousServicesController extends AbstractController
{
    #[Route('/sous/services', name: 'app_sous_services')]
    public function index(): Response
    {
        return $this->render('sous_services/index.html.twig', [
            'controller_name' => 'SousServicesController',
        ]);
    }
}
