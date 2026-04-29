<?php

namespace App\Controller\Front;

use App\Entity\Feedback;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoiteAIdeesController extends AbstractController
{
    #[Route('/boite-a-idees', name: 'app_boite_a_idees')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $message = trim($request->request->get('message', ''));

            if (strlen($message) >= 5 && strlen($message) <= 1000) {
                $feedback = new Feedback();
                $feedback->setType('feature');
                $feedback->setMessage($message);
                $feedback->setPage('/boite-a-idees');
                $feedback->setUserEmail($this->getUser()?->getEmail());

                $em->persist($feedback);
                $em->flush();

                $this->addFlash('success', 'Merci ! Votre idée a bien été envoyée. 💡');
            } else {
                $this->addFlash('error', 'Votre message doit contenir entre 5 et 1000 caractères.');
            }

            return $this->redirectToRoute('app_boite_a_idees');
        }

        return $this->render('menu_dropdown/a_propos_de_notre_club/boite_a_idee/index.html.twig');
    }
}
