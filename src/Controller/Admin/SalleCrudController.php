<?php

namespace App\Controller\Admin;

use App\Entity\Salle;
use App\Controller\Admin\LogicielCrudController;
use App\Controller\Admin\MaterielCrudController;
use App\Controller\Admin\ErgonomieCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SalleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Salle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('nom','Nom '),
            NumberField::new('capacite','Taille')
            ->setHelp("La capacité maximale de personnes"),
            AssociationField::new('ergonomie','Ergonomie')->autocomplete()
            ->setCrudController(ErgonomieCrudController::class)
            ->setHelp('l\'ergonomie de la salle'),
            AssociationField::new('materiel','Materiel')
            ->setCrudController(MaterielCrudController::class)
            ->setHelp('les materiels disponibles dans la salle'),
            AssociationField::new('logiciel','Logiciel')->autocomplete()
            ->setCrudController(LogicielCrudController::class)
            ->setHelp('les logiciels disponibles sur les ordinateur de la salle'),
        ];
    }
}
