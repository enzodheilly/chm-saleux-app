<?php

namespace App\Controller\Admin;

use App\Entity\Feedback;
use App\Repository\FeedbackRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AdminFeedbackController extends AbstractController
{
    #[Route('/feedback/submit', name: 'feedback_submit', methods: ['POST'])]
    public function submit(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $type    = $data['type']    ?? null;
        $message = trim($data['message'] ?? '');
        $page    = $data['page']    ?? null;

        $allowedTypes = ['bug', 'feature', 'general', 'improvement'];

        if (!in_array($type, $allowedTypes) || strlen($message) < 5 || strlen($message) > 1000) {
            return $this->json(['success' => false, 'error' => 'Données invalides.'], 400);
        }

        $feedback = new Feedback();
        $feedback->setType($type);
        $feedback->setMessage($message);
        $feedback->setPage($page);
        $feedback->setUserEmail($this->getUser()?->getEmail());

        $em->persist($feedback);
        $em->flush();

        return $this->json(['success' => true]);
    }

    #[Route('/admin/feedbacks', name: 'admin_feedbacks')]
    #[IsGranted('ROLE_ADMIN')]
    public function adminList(FeedbackRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        // Mise à jour du statut via POST
        if ($request->isMethod('POST')) {
            $id     = $request->request->get('id');
            $status = $request->request->get('status');
            $fb     = $repo->find($id);

            if ($fb && in_array($status, ['new', 'read', 'done'])) {
                $fb->setStatus($status);
                $em->flush();
            }

            return $this->redirectToRoute('admin_feedbacks');
        }

        return $this->render('admin/feedback/feedbacks.html.twig', [
            'feedbacks'  => $repo->findAllOrderedByDate(),
            'countNew'   => $repo->countByStatus('new'),
            'countRead'  => $repo->countByStatus('read'),
            'countDone'  => $repo->countByStatus('done'),
        ]);
    }
}
