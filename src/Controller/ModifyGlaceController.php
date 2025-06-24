<?php

namespace App\Controller;

use App\Entity\Glaces;
use App\Form\GlacesTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ModifyGlaceController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/modify/glace/{id}', name: 'modify_glace')]
    public function modify(Glaces $glace, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GlacesTypeForm::class, $glace);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($glace);
            $entityManager->flush();

            $this->addFlash('success', 'Glace modifiée avec succès !');

            return $this->redirectToRoute('home');
        }

        return $this->render('modify_glace/modify_glace.html.twig', [
            'glaceForm' => $form->createView(),
        ]);
    }
}
