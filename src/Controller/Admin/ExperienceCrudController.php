<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExperienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experience::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            ChoiceField::new('type')->setChoices($this->getExperienceChoices()),
            DateField::new('date_start'),
            DateField::new('date_end'),
            TextEditorField::new('description'),
        ];
    }

    private function getExperienceChoices(): array
    {
        return [
            ExperienceType::Education->value   => ExperienceType::Education->value,
            ExperienceType::Internship->value  => ExperienceType::Internship->value,
            ExperienceType::Work->value        => ExperienceType::Work->value,
            ExperienceType::CurrentWork->value => ExperienceType::CurrentWork->value,
        ];
    }

}
