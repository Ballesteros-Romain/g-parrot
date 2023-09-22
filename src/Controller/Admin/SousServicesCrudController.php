<?php

namespace App\Controller\Admin;

use App\Entity\SousServices;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SousServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SousServices::class;
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
