<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ParteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ParteController extends AbstractController
{
    #[Route('/parte')]
    public function index(): Response
    {
        return $this->render('parte/index.html.twig');
    }

    #[Route("/ap13/{texto}")]
    public function ap13(ParteRepository $parteRepository, string $texto): Response
    {
        $partes = $parteRepository->findByTexts($texto);
        return $this->render("partes_general.html.twig", ["partes" => $partes]);
    }
}
