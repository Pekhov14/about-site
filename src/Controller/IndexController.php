<?php

namespace App\Controller;

use App\Repository\SkillsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(SkillsRepository $skillsRepository): Response
    {
        $skillsData = $skillsRepository->findBy([], ['sort_order' => 'ASC']);

        dd($skillsData);

        $skills = [];

//        foreach ($skillsData as $skill) {
//            $mySkill = (array)$skill;
//            dd($mySkill);
//
//            $skills[][$mySkill['sort_order']] = $mySkill;
//        }

        dd($skills);

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
