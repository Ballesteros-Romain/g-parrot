<?php

namespace App\Controller;

use App\Repository\CarsRepository;
use App\Repository\HorairesRepository;
use App\Repository\ServicesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\Pagination\PaginationInterface; // Assurez-vous d'importer cette classe




class CarsController extends AbstractController
{
    #[Route('/vehicule', name: 'app_cars')]
    public function index(HorairesRepository $horairesRepository,
    CarsRepository $carsRepository, 
    PaginatorInterface $paginatorInterface,
    ServicesRepository $servicesRepository, 
    Request $request): Response
    {
        $car = $carsRepository->findAll();

        // $pagintation = $paginatorInterface->paginate($car, $request->query->getInt('page', 1), 6);

        return $this->render('cars/index.html.twig', [
            'controller_name' => 'CarsController',
            'horaires' => $horairesRepository->findAll(),
            'cars' => $carsRepository->findAll(),
            // 'cars' => $pagintation,
            'services' => $servicesRepository->findAll()

        ]);
    }

    #[Route('/get_cars', name: 'get_cars')]
    public function getAllCars(CarsRepository $carsRepository, Request $request): JsonResponse
    {
        $jsonData = json_decode($request->getContent(), true);

        $marque = $jsonData['marque'];
        $kilometre = $jsonData['kilometre'];
        $annee = $jsonData['annee'];
        $price = $jsonData['price'];

        $filteredCars = $carsRepository->findByFilters($marque, $kilometre, $annee, $price *100); 

        $filteredData = [];
        foreach ($filteredCars as $cars) {
            $filteredData[] = [
                'id' => $cars->getId(),
                'marque' => $cars->getMarque(),
                'kilometre' => $cars->getKilometre(),
                'annee' => $cars->getAnnee(),
                'price' => $cars->getPrice(),
                'image'=> $cars->getImage(),
                'url' => $this->generateUrl('app_formulaire_from_card', [
                    'marque' => $cars->getMarque(),
                    'price' => $cars->getPrice(),
                ])
            ];
        }

        return new JsonResponse($filteredData);
}
}