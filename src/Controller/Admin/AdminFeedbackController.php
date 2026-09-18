<?php

namespace App\Controller\Admin;

use App\Entity\Feedback;
use App\Repository\FeedbackRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_SUPER_ADMIN')]
class AdminFeedbackController extends AbstractController
{
    #[Route('/gestion-chm-secrete-92x/feedbacks', name: 'admin_feedbacks')]
    public function adminList(FeedbackRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        // Mise à jour du statut via POST
        if ($request->isMethod('POST')) {
            $id     = $request->request->get('id');
            $status = $request->request->get('status');

            if (!$this->isCsrfTokenValid('feedback_status_' . $id, (string) $request->request->get('_token', ''))) {
                $this->addFlash('error', 'Jeton CSRF invalide.');
                return $this->redirectToRoute('admin_feedbacks');
            }

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
