<?php

namespace App\Controller\Front;

use App\Repository\ArticleRepository;
use App\Repository\MachineRepository;
use App\Repository\ForfaitRepository;
use App\Repository\NewsletterSubscriberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        ArticleRepository $articleRepository,
        MachineRepository $machineRepository,
        ForfaitRepository $forfaitRepository,
        NewsletterSubscriberRepository $subscriberRepository,
        Request $request
    ): Response {
        // Si tu veux que les admins ne passent jamais par la home
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_dashboard');
        }

        $user = $this->getUser();

        $subscriber = null;
        $isSubscribed = false;
        $membershipDuration = null;

        if ($user) {
            $subscriber = $subscriberRepository->findOneBy([
                'email' => $user->getEmail(),
                'isConfirmed' => true,
            ]);

            $isSubscribed = $subscriber !== null;
            $membershipDuration = $this->computeMembershipDuration($user->getCreatedAt());
        }

        return $this->render('0_home/index.html.twig', [
            'articles' => $articleRepository->findLatest(3),
            'machines' => $machineRepository->findLatest(),
            'plans' => $forfaitRepository->findBy([], ['prix' => 'ASC']),
            'isSubscribed' => $isSubscribed,
            'subscriber' => $subscriber,
            'showSetPasswordModal' => (bool) $request->query->get('showSetPasswordModal', false),
            'membershipDuration' => $membershipDuration,
        ]);
    }

    private function computeMembershipDuration(?\DateTimeInterface $createdAt): ?array
    {
        if (!$createdAt) {
            return null;
        }

        $now = new \DateTimeImmutable();
        $diff = $createdAt->diff($now);

        return [
            'years' => $diff->y,
            'months' => $diff->m,
            'days' => $diff->d,
        ];
    }
}
