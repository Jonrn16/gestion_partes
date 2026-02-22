<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProfesorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfesorController extends AbstractController
{
    #[Route('/profesor')]
    public function index(): Response
    {
        return $this->render('profesor/index.html.twig');
    }

    #[Route("/ap11")]
    public function ap11(ProfesorRepository $profesorRepository): Response
    {
        $profesores = $profesorRepository->findAll();
       return $this->render("profesor_listado_partes.html.twig", ["profesores" => $profesores]);
    }

    #[Route("/ap11/{id}/partes")]
    public function ap11_listado_partes(ProfesorRepository $profesorRepository, int $id): Response
    {
        $profesor = $profesorRepository->find($id);
       return $this->render("profesor_partes.html.twig", ["profesor" => $profesor]);
    }

    #[Route("/ap14")]
    public function ap14(ProfesorRepository $profesorRepository): Response
    {
        $profesores = $profesorRepository->findByNoneparte();
        return $this->render("profesor_general.html.twig",  ["profesores" => $profesores]);

    }
}
