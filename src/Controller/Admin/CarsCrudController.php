<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\EventDispatcher\GenericEvent;

class CarsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cars::class;
    }

    // public function configureActions(Actions $actions): Actions
    // {
    //     $delete = Action::new('supprimer')
    //         ->linkToCrudAction('deleteProduct');
    //     return $actions
    //         ->add(Crud::PAGE_DETAIL, $delete);

        
    // }
    public function preRemove(GenericEvent $event)
    {
        $car = $event->getSubject();

        if ($car instanceof Cars){
            $car->removeImage();
        }
    }


    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('marque'),
            IntegerField::new('kilometre'),
            NumberField::new('annee', 'Année')->setNumberFormat('%d'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR'),
            ImageField::new('image')
            ->setBasePath('uploads/image')
            ->setUploadDir('public/uploads/image')
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Voitures d\'occasion')
        ->setPaginatorPageSize(15);
    }

}