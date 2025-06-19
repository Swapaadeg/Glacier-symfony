<?php

namespace App\Controller;

use App\Entity\Glaces;
use App\Form\GlacesTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AddGlaceController extends AbstractController
{
    #[Route('/add/glace', name: 'add_glace')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $glace = new Glaces();
        $form = $this->createForm(GlacesTypeForm::class, $glace);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($glace);
            $entityManager->flush();

            $this->addFlash('success', 'Glace ajoutée avec succès !');

            return $this->redirectToRoute('home');
        }

        return $this->render('add_glace/addGlace.html.twig', [
            'glaceForm' => $form->createView(),
        ]);
    }
}
