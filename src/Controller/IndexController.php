<?php

namespace App\Controller;

use App\Service\SectionDataGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private readonly SectionDataGenerator $sectionDataGenerator;
    public function __construct(private readonly EntityManagerInterface $em)
    {
        $this->sectionDataGenerator = new SectionDataGenerator($this->em);
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $skills      = $this->sectionDataGenerator->getSkills();
        $faq         = $this->sectionDataGenerator->getFAQ();
        $experiences = $this->sectionDataGenerator->getExperience();

        return $this->render('index/index.html.twig', [
            'skills'      => $skills,
            'faq'         => $faq,
            'experiences' => $experiences
        ]);
    }
}
