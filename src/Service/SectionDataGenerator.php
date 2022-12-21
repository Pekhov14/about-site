<?php

namespace App\Service;

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

    public function getFAQ()
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
}