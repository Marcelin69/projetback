<?php

namespace App\Controller\Admin;

use App\Entity\Materiel;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MaterielCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Materiel::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('description'),
        ];
    }
    
}
