<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use PhpParser\Node\Expr\Yield_;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AvisCrudController extends AbstractCrudController
{
    #[IsGranted('ROLE_USER')]

    public static function getEntityFqcn(): string
    {
        return Avis::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'),
            TextareaField::new('commentaire'),
            'note' => ChoiceField::new('note')
                ->setLabel('Note')
                ->setChoices([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                ])
                ->setRequired(true)
                ->setHelp('Entrez une note de 1 à 10'),
            // 'is_active' => BooleanField::new('active')
            //     ->setLabel('Publier')
            //     ->setProperty('isActive')
                // ->setPermission('ROLE_ADMIN')
            BooleanField::new('is_active', 'Publier')
                    ->setProperty('isActive')
            
        ];
    }
    
}