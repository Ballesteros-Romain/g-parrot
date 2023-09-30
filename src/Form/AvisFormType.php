<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class AvisFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', options:[
            'label' => 'Nom'
        ])
        ->add('commentaire', TextareaType::class, [
            'label' => 'Commentaire'
        ]);
        $builder->add('note', ChoiceType::class, [
            'label' => 'Note',
            'choices' => [
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
            ],
            'required' => true,
            'help' => 'Entrez une note de 1 à 10',
        ]);

        // $builder->add('is_active', CheckboxType::class, [
        //     'label' => 'Publier',
        //     'data' => false, // Définit la valeur par défaut à false.
        // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}