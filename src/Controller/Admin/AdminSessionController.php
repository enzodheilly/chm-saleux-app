<?php

namespace App\Controller\Admin;

use App\EventSubscriber\AdminSessionSubscriber;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_SUPER_ADMIN')]
class AdminSessionController extends AbstractController
{
    public function __construct(private readonly RequestStack $requestStack) {}

    #[Route('/admin/session/ping', name: 'admin_session_ping', methods: ['GET'])]
    public function ping(): JsonResponse
    {
        $this->requestStack->getSession()->set('admin_last_activity', time());

        return new JsonResponse([
            'ok'        => true,
            'remaining' => AdminSessionSubscriber::ADMIN_SESSION_LIFETIME,
        ]);
    }
}
