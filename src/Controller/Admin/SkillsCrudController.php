<?php

namespace App\Controller\Admin;

use App\Entity\Skills;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class SkillsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Skills::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('icon'),
            NumberField::new('sort_order'),
            ChoiceField::new('slug')->setChoices($this->getSugChoices())
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPaginatorPageSize(10);
    }

    private function getSugChoices(): array
    {
        return [
            SkillSlug::Languages->name  => SkillSlug::Languages->name,
            SkillSlug::Frameworks->name => SkillSlug::Frameworks->name,
            SkillSlug::Tools->name      => SkillSlug::Tools->name,
            SkillSlug::Databases->name  => SkillSlug::Databases->name,
        ];
    }
}
