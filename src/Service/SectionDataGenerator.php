<?php

namespace App\Service;

use App\Entity\Skills;
use Doctrine\ORM\EntityManagerInterface;

class SectionDataGenerator
{
    public function getSkills(EntityManagerInterface $entityManager): array
    {
        $skillsRepository = $entityManager->getRepository(Skills::class);
        $skillsData = $skillsRepository->findBy([], ['sort_order' => 'ASC']);

        $skills = [];

        foreach ($skillsData as $skill) {
            $slug = $skill->getSlug();

            $skills[$slug][] = [
                'name' => $skill->getName(),
                'icon' => $skill->getIcon(),
            ];

            arsort($skills[$slug]);
        }

        return $skills;
    }
}