<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\GrupoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GrupoController extends AbstractController
{
    #[Route('/grupo')]
    public function index(): Response
    {
        return $this->render('grupo/index.html.twig');
    }

    #[Route('/ap8')]
    public function ap8(GrupoRepository $grupoRepository)
    {
        $grupos = $grupoRepository->findAll();

        return $this->render("grupo_general.html.twig", ["cursos" => $grupos]);
    }

    #[Route("/ap9")]
    public function ap9(GrupoRepository $grupoRepository)
    {
        $grupos = $grupoRepository->findAll();

        return $this->render("grupo_ordenado_estudiantes.html.twig", ["cursos" => $grupos]);

    }

    #[Route("/ap10")]
    public function ap10(GrupoRepository $grupoRepository)
    {
        $grupos = $grupoRepository->findAll();

        return $this->render("grupo_enlances.html.twig", ["grupos" => $grupos]);
    }

    #[Route("/ap10/{id}/alumnos")]
    public function ap10_listado(GrupoRepository $grupoRepository, int $id)
    {
        $grupo = $grupoRepository->find($id);

        return $this->render("grupo_listado_alumnos.html.twig",["grupo" => $grupo]);

}
}
