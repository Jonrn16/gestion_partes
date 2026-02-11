<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AlumnoController extends AbstractController
{
    #[Route('/alumno')]
    public function index(): Response
    {
        return $this->render('alumno/index.html.twig');
    }


}
