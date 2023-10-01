<?php

namespace App\Controller;

use App\Entity\Horaires;
use App\Repository\HorairesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HorairesController extends AbstractController
{
    #[Route('/horaires', name: 'app_horaires')]
    public function index(Request $request, EntityManagerInterface $em, HorairesRepository $horairesRepository): Response
    {

        $horaires = $horairesRepository->findAll();
        
        return $this->render('_partials/_footer.html.twig', [
            'horaires'=>$horaires,
        ]);
    }
}