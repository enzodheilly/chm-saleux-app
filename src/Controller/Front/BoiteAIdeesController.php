<?php

namespace App\Controller\Front;

use App\Entity\Feedback;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\Routing\Annotation\Route;

class BoiteAIdeesController extends AbstractController
{
    public function __construct(
        private readonly RateLimiterFactory $boiteAIdeesLimiter
    ) {}

    #[Route('/boite-a-idees', name: 'app_boite_a_idees')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            if (!$this->isCsrfTokenValid('boite_a_idees', (string) $request->request->get('_token', ''))) {
                $this->addFlash('error', 'Jeton de sécurité invalide. Veuillez réessayer.');
                return $this->redirectToRoute('app_boite_a_idees');
            }

            $limiterKey = 'boite_a_idees_' . ($request->getClientIp() ?? 'unknown');
            if (!$this->boiteAIdeesLimiter->create($limiterKey)->consume(1)->isAccepted()) {
                $this->addFlash('error', 'Trop de soumissions. Réessayez dans quelques minutes.');
                return $this->redirectToRoute('app_boite_a_idees');
            }

            $message = trim($request->request->get('message', ''));

            if (strlen($message) >= 5 && strlen($message) <= 1000) {
                $user = $this->getUser();

                $feedback = new Feedback();
                $feedback->setType('feature');
                $feedback->setMessage($message);
                $feedback->setPage('/boite-a-idees');
                $feedback->setUserEmail($user instanceof \App\Entity\User ? $user->getEmail() : null);

                $em->persist($feedback);
                $em->flush();

                $this->addFlash('success', 'Merci ! Votre idée a bien été envoyée.');
            } else {
                $this->addFlash('error', 'Votre message doit contenir entre 5 et 1000 caractères.');
            }

            return $this->redirectToRoute('app_boite_a_idees');
        }

        return $this->render('menu_dropdown/a_propos_de_notre_club/boite_a_idee/index.html.twig');
    }
}
