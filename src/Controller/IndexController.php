<?php

namespace App\Controller;

use App\Service\SectionDataGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(SectionDataGenerator $dataGenerator, EntityManagerInterface $em): Response
    {
        $skills = $dataGenerator->getSkills($em);

        return $this->render('index/index.html.twig', [
            'skills' => $skills,
        ]);
    }
}
