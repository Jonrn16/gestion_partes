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

    #[Route("/ap1")]
    public function ap1(AlumnoRepository $alumnoRepository): Response
    {
        $alumnos_Maria = $alumnoRepository->findbyName("María");
        return $this->render("alumno_nombre.html.twig", ["alumnos" => $alumnos_Maria]);

    }

    #[Route("/ap2")]
    public function ap2(AlumnoRepository $alumnoRepository): Response
    {
        $alumnosNotMaria = $alumnoRepository->findByExcludingName("María");
        return $this->render("alumno_nombre.html.twig", ["alumnos" => $alumnosNotMaria]);

    }

    #[Route("/ap3/{nombre}")]
    public function ap3(AlumnoRepository $alumnoRepository, string $nombre): Response
    {
        $alumnos_Maria = $alumnoRepository->findbyName("$nombre");
        return $this->render("alumno_nombre.html.twig", ["alumnos" => $alumnos_Maria]);

    }


}
