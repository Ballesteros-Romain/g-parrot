<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RolesController extends AbstractController
{
    #[Route('/roles', name: 'app_roles')]
    public function index(HorairesRepository $horairesRepository): Response
    {
        return $this->render('roles/index.html.twig', [
            'controller_name' => 'RolesController',
            'horaires'=>$horairesRepository->findAll()
        ]);
    }
}