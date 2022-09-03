<?php

namespace App\Controller\Admin;

use App\Entity\SousFamille;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SousFamilleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SousFamille::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            AssociationField::new('famille')
        ];
    }
}
