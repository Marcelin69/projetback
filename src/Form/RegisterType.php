<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom',TextType::class,[
            "label" =>"Nom",
            "constraints"=>array(
                new NotBlank(["message"=>"Veuillez entrer votre nom"]),
                )])       
        ->add('prenom',TextType::class,[
            "label" =>'Prénom',
            "constraints"=>array(
                new NotBlank(['message'=>'Veuillez entrer votre prénom']),
                ),
        ])
        ->add('email',EmailType::class,[
            "label" =>'Adresse email',
            "constraints"=>array(
                new NotBlank(['message'=>'Veuillez entrer une adresse mail valide'])
                ),
        ])
        ->add('password',PasswordType::class, [
          'mapped'=>false,
          'attr'=>['autocomplete'=>'new-password'],
          'constraints'=>[
            new NotBlank([
                'message'=>'Entrez un mots de passe'
            ]),
            new Length([
                'min'=>8,'max'=>256,
                'minMessage'=>'Le mot de passe doit faire entre 8 et 256'
            ]),
          ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
