<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('salle',TextType::class,[
            "label" =>"Salle",
            "attr"=>["placeholder"=>"Entrez le nom de la salle"]
            
        ])
        ->add('utilisateur',TextType::class,[
            "label" =>'Utilisateur ',
            "attr"=>[
                "placeholder"=>"Entrez l\'identifiant utilisateur"
            ]
        ])
        ->add('datedebut',DateType::class,[
           
        ])
        ->add('datefin',DateType::class,[
           

        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
