<?php

namespace App\Controller\Admin;


use App\Entity\Cars;
use App\Controller\Admin\CarsCrudController;
use App\Entity\Avis;
use App\Entity\Formulaire;
use App\Entity\Horaires;
use App\Entity\Roles;
use App\Entity\Services;
use App\Entity\SousServices;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Http\Attribute\IsGranted;



class DashboardController extends AbstractDashboardController
{
    #[IsGranted('ROLE_USER')]

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CarsCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V.Parrot')
            ->setLocales(['fr']);
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('retour site', 'fa fa-home', 'home_');
        yield MenuItem::linkToCrud('Voiture', 'fa-solid fa-car', Cars::class);
        yield MenuItem::linkToCrud('Avis', 'fa-solid fa-comment', Avis::class);
        yield MenuItem::linkToCrud('formulaire', 'fa-brands fa-wpforms', Formulaire::class);
        yield MenuItem::linkToCrud('horaires', 'fa-solid fa-clock', Horaires::class);
        // yield MenuItem::linkToCrud('roles', 'fa-solid fa-user', Roles::class);
        yield MenuItem::linkToCrud('Services', 'fa-solid fa-briefcase', Services::class);
        yield MenuItem::linkToCrud('SousServices', 'fa-solid fa-briefcase', SousServices::class);
        // yield MenuItem::linkToCrud('Users', 'fa-solid fa-users', Users::class);
    
        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::linkToCrud('Utilisateurs', 'fa-solid fa-users', Users::class);

        }
    }
}