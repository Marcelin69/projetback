<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Salle;
use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            AssociationField::new('utilisateur', 'Utilisateur')
                ->setCrudController(User::class)
                ->setHelp('le visiteur qui fair la location')
                ->hideOnIndex(),
            AssociationField::new('salle', 'salle')
                ->setCrudController(Salle::class)
                ->setHelp('la salle qu\'il veux louer')
                ->hideOnIndex(),
            BooleanField::new('reserve', 'Reservé'),
            DateField::new('dateDebut', 'Date de Debut'),
            DateField::new('datefin', 'Date de fin '),
            // TextEditorField::new('description'),
        ];
    }
    
}
