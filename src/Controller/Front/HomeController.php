<?php

namespace App\Controller\Front;

use App\Repository\ArticleRepository;
use App\Repository\NewEquipmentRepository;
use App\Repository\MembershipPlanRepository;
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
        NewEquipmentRepository $newEquipmentRepository,
        MembershipPlanRepository $membershipPlanRepository,
        NewsletterSubscriberRepository $subscriberRepository,
        Request $request
    ): Response {
        // If you want admins to never go through the homepage
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_dashboard');
        }

        $user = $this->getUser();

        $subscriber = null;
        $isSubscribed = false;

        if ($user) {
            $subscriber = $subscriberRepository->findOneBy([
                'email' => $user->getEmail(),
                'isConfirmed' => true,
            ]);

            $isSubscribed = $subscriber !== null;
        }

        return $this->render('0_home/index.html.twig', [
            'articles' => $articleRepository->findLatest(3),
            'newEquipments' => $newEquipmentRepository->findLatest(),
            'plans' => $membershipPlanRepository->findBy([], ['price' => 'ASC']),
            'isSubscribed' => $isSubscribed,
            'subscriber' => $subscriber,
            'showSetPasswordModal' => (bool) $request->query->get('showSetPasswordModal', false),
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
