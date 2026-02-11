<?php

declare(strict_types=1);

namespace App\Controller;

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
}
