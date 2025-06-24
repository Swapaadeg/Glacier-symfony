<?php

namespace App\Controller;

use App\Entity\Glaces;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//DELETE
final class DeleteGlaceController extends AbstractController
{   
    #[IsGranted('ROLE_USER')]
    #[Route('/delete/glace/{id}', name: 'delete_glace')]
    public function delete(Glaces $glace, Request $request, EntityManagerInterface $entityManager)
    {
        if($this->isCsrfTokenValid("SUP". $glace->getID(), $request->get('_token'))) {
            $entityManager->remove($glace);
            $entityManager->flush();
            $this->addFlash("success", "La suppression a été effectuée");
            return $this->redirectToRoute("home");
            };
    }
}