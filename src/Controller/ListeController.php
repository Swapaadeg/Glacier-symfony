<?php

namespace App\Controller;

use App\Repository\GlacesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListeController extends AbstractController
{
    #[Route('/liste', name: 'liste')]
    public function index(GlacesRepository $repository): Response
    {
        $glaces = $repository->findAll();

        return $this->render('liste/liste.html.twig', [
            'glaces' => $glaces,
        ]);
    }
}
