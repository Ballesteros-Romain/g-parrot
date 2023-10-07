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

        $pagintation = $paginatorInterface->paginate($car, $request->query->getInt('page', 1), 6);

        return $this->render('cars/index.html.twig', [
            'controller_name' => 'CarsController',
            'horaires' => $horairesRepository->findAll(),
            'cars' => $carsRepository->findAll(),
            'cars' => $pagintation,
            'services' => $servicesRepository->findAll()

        ]);
    }

    #[Route('/cars/filter', name: 'app_cars_filter')] // Ajoutez cette nouvelle route
public function filter(Request $request, CarsRepository $carsRepository): JsonResponse
{
    try {
        // Obtenez les valeurs des filtres de la requête AJAX
        $marque = $request->request->get('marque');
        $kilometre = $request->request->get('kilometre');
        $annee = $request->request->get('annee');
        $price = $request->request->get('price');
        // dd($marque, $kilometre, $annee, $price);
        // Filtrez les voitures en fonction des valeurs des filtres
        $filteredCars = $carsRepository->findByFilters($marque, $kilometre, $annee, $price);

        $filteredData = [];
        foreach ($filteredCars as $car) {
            $filteredData[] = [
                'id' => $car->getId(),
                'marque' => $car->getMarque(),
                'kilometre' => $car->getKilometre(),
                'annee' => $car->getAnnee(),
                'price' => $car->getPrice(),
                // Ajoutez d'autres champs si nécessaire
            ];
        }// Renvoyez une réponse JSON contenant les voitures filtrées
        return new JsonResponse($filteredCars, 200);
    } catch (\Exception $e) {
        // En cas d'erreur, renvoyez une réponse JSON avec le statut 400 (Bad Request) par exemple
        return new JsonResponse(['error' => 'Une erreur s\'est produite'], 500);
    }
}
}