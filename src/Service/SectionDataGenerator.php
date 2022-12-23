<?php

namespace App\Service;

use App\Entity\Experience;
use App\Entity\FAQ;
use App\Entity\Skills;
use App\Repository\FAQRepository;
use Doctrine\ORM\EntityManagerInterface;

class SectionDataGenerator
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function getSkills(): array
    {
        $skillsRepository = $this->entityManager->getRepository(Skills::class);
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

    public function getFAQ(): array
    {
        $repository = $this->entityManager->getRepository(FAQ::class);
        $faqDataObjects = $repository->findBy([], ['sort_order' => 'ASC']);

        $faq = [];

        foreach ($faqDataObjects as $faqDataObject) {
            $faq[] = [
                'question' => $faqDataObject->getQuestion(),
                'answer'   => $faqDataObject->getAnswer()
            ];
        }

        return $faq;
    }

    public function getExperience(): array
    {
        $repository = $this->entityManager->getRepository(Experience::class);
        $experienceObjects = $repository->findBy([], ['date_start' => 'DESC']);

        $experiences = [];

        foreach ($experienceObjects as $experience) {
            $experiences[] = [
                'type'        => $experience->getType(),
                'name'        => $experience->getName(),
                'description' => $experience->getDescription(),
                'date_start'  => $experience->getDateStart()?->format('d.m.Y'),
                'date_end'    => ($experience->getDateEnd() === null)
                    ? 'Present'
                    : $experience->getDateEnd()->format('d.m.Y'),
            ];
        }

        return $experiences;
    }
}