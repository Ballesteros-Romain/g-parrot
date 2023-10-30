<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;

use function PHPUnit\Framework\returnSelf;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersCrudController extends AbstractCrudController
{
     public function __construct(
        public UserPasswordHasherInterface $userPasswordHasher
    ) {}

    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('Email')
            ->setRequired(true),
            TextField::new('password')
            ->setLabel('Mot de passe')
            ->setFormType(PasswordType::class)
            ->hideOnIndex(),
            // TextField::new('roles')
        ];
            
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entity): void
{
    // Hachage du mot de passe
    $hashedPassword = $this->userPasswordHasher->hashPassword($entity, $entity->getPassword());
    $entity->setPassword($hashedPassword);

    // Enregistrement de l'entité
    $entityManager->persist($entity);
    $entityManager->flush();
}


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Utilisateurs');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter un utilisateurs');
            });
    }
    
}