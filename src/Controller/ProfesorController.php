<?php

declare(strict_types=1);

namespace App\Controller;

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
}
