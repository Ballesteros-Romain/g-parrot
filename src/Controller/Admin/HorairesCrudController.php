<?php

namespace App\Controller\Admin;

use App\Entity\Horaires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HorairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaires::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
