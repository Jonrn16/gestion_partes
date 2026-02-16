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

        return $this->render("grupo_general.html.twig", ["cursos" => $grupos]);

    }
}
