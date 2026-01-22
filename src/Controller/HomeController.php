<?php

namespace App\Controller;

use App\Entity\NewsletterSubscriber;
use App\Repository\ArticleRepository;
use App\Repository\MachineRepository; // <-- AJOUT ICI
use App\Service\NewsletterService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        ArticleRepository $articleRepository,
        MachineRepository $machineRepository, // <-- AJOUT ICI
        NewsletterService $newsletterService,
        EntityManagerInterface $em,
        Request $request
    ): Response {
        $user = $this->getUser();
        $isSubscribed = false;
        $subscriber = null;
        $membershipDuration = null;

        if ($user) {
            $subscriber = $em->getRepository(NewsletterSubscriber::class)
                ->findOneBy([
                    'email' => $user->getEmail(),
                    'isConfirmed' => true
                ]);

            $isSubscribed = $subscriber !== null;

            if ($user->getCreatedAt()) {
                $now = new \DateTimeImmutable();
                $diff = $user->getCreatedAt()->diff($now);

                $membershipDuration = [
                    'years' => $diff->y,
                    'months' => $diff->m,
                    'days' => $diff->d,
                ];
            }

            if ($this->isGranted('ROLE_ADMIN')) {
                return $this->redirectToRoute('admin_dashboard');
            }
        }

        // 🔥 Récupération des machines
        $machines = $machineRepository->findLatest();

        $articles = $articleRepository->findBy([], ['publishedAt' => 'DESC']);

        $showSetPasswordModal = $request->query->get('showSetPasswordModal', false);

        return $this->render('0_home/index.html.twig', [
            'articles' => $articles,
            'machines' => $machines, // <-- ENVOI À TWIG
            'isSubscribed' => $isSubscribed,
            'subscriber' => $subscriber,
            'showSetPasswordModal' => $showSetPasswordModal,
            'membershipDuration' => $membershipDuration,
        ]);
    }
}
