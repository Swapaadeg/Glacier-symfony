<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AddGlaceController extends AbstractController
{
    #[Route('/add/glace', name: 'add_glace')]
    public function index(): Response
    {
        return $this->render('add_glace/addGlace.html.twig', [
            'controller_name' => 'AddGlaceController',
        ]);
    }
}
