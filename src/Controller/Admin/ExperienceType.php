<?php

namespace App\Controller\Admin;

enum ExperienceType: string
{
    case Education = 'Education';
    case Internship = 'Internship';
    case Work = 'Work';
    case CurrentWork = 'Current work';
}
