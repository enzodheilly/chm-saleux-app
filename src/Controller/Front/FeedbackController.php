<?php

namespace App\Controller\Front;

use App\Entity\Feedback;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class FeedbackController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/feedback/submit', name: 'feedback_submit', methods: ['POST'])]
    public function submit(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $type    = $data['type']    ?? null;
        $message = trim($data['message'] ?? '');
        $page    = $data['page']    ?? null;

        $allowedTypes = ['bug', 'feature', 'general', 'improvement'];

        if (!in_array($type, $allowedTypes, true) || strlen($message) < 5 || strlen($message) > 1000) {
            return $this->json(['success' => false, 'error' => 'Données invalides.'], 400);
        }

        $user = $this->getUser();

        $feedback = new Feedback();
        $feedback->setType($type);
        $feedback->setMessage($message);
        $feedback->setPage($page);
        $feedback->setUserEmail($user instanceof \App\Entity\User ? $user->getEmail() : null);

        $em->persist($feedback);
        $em->flush();

        return $this->json(['success' => true]);
    }
}
