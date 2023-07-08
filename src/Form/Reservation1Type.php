<?php

namespace App\Form;
use DateTime;
use App\Entity\User;
use App\Entity\Salle;
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
        
      
    
        $builder
        ->add('salle',EntityType::class,[
            "label" =>"Salle",
            "required"=>true,
            "attr"=>["class"=>"form-control"],
            "class"=>Salle::class,
            // 'query_builder' => function (SalleRepository $er)/* use($salleid) */{
            //     $lolo=$er->Salle::class($salleid);
            //     return $er->createQueryBuilder()
            //             -> select('*')
            //             ->from('salle','s')
            //             ->where('m.id','IS', $lolo)

            //         ->orderBy('u.nom', 'ASC');
                    

            // },
        ])
        ->add('utilisateur',EntityType::class,[
            "label" =>"Salle",
            "required"=>true,
            "attr"=>["class"=>"form-control"],
            "class"=>User::class,
            
        ])
        ->add('datedebut',DateType::class,[
        //    'datedebut'=>$currentDate
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
