<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $user = $this->getUser();
        $username = $user ? $user->getUserIdentifier() : null;

        return $this->render('home/index.html.twig', [
            'username' => $username,
        ]);
    }
}
