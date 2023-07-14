<?php

namespace App\Form;
use DateTime;
use App\Entity\User;
use App\Entity\Salle;
use DateTimeImmutable;
use App\Entity\Reservation;
use Doctrine\ORM\QueryBuilder;
use App\Repository\SalleRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Reservation1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
         
        $now = new DateTimeImmutable();
      

        $builder
        // ->add('salle',TextType::class,[
        //     "label" =>"Salle",
        //     "required"=>true,
        //     "attr"=>["class"=>"form-control"],
           
        // ])
        ->add('datedebut',DateType::class,[
        
        "attr"=>["value"=>$now->getTimestamp()],
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
