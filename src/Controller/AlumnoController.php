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

    #[Route("/ap4")]
    public function ap4(AlumnoRepository $alumnoRepository): Response
    {
        $alumnos_Ojeda = $alumnoRepository->findByFirstSurname("Ojeda");
        return $this->render("alumnos_primer_apellido.html.twig", ["alumnos" => $alumnos_Ojeda]);
    }

    #[Route("/ap5")]
    public function ap5(AlumnoRepository $alumnoRepository): Response
    {
        $alumnos1997 = $alumnoRepository->findByYear(1997);
        return $this->render("alumno_nombre.html.twig", ["alumnos" => $alumnos1997]);
    }

    #[Route("/ap6")]
    public function ap6(AlumnoRepository $alumnoRepository): Response
    {
        $alumnos1997 = $alumnoRepository->findByYear(1997);
        return $this->render("alumno_año_cantidad.html.twig", ["alumnos" => $alumnos1997]);
    }

    #[Route ("/ap7/{anyo}")]
    public function ap7(AlumnoRepository $alumnoRepository, int $anyo)
    {
        $alumnosAnyo = $alumnoRepository->findByYear($anyo);
        return $this->render("alumno_año_cantidad.html.twig", ["alumnos" => $alumnosAnyo]);
    }

}
