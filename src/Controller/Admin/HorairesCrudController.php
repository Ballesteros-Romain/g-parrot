<?php

namespace App\Controller\Admin;

use App\Entity\Horaires;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HorairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaires::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('heure_matin'),
            TextField::new('heure_soir'),
            TextField::new('jour'),
        ];
    }
    
}