<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_STAFF')]
class AdminPreviewController extends AbstractController
{
    public function __construct(private readonly RequestStack $requestStack) {}

    #[Route('/admin/preview/on', name: 'admin_preview_on')]
    public function enablePreview(): RedirectResponse
    {
        $this->requestStack->getSession()->set('_admin_preview_mode', true);
        return $this->redirect('/');
    }

    #[Route('/admin/preview/off', name: 'admin_preview_off')]
    public function disablePreview(): RedirectResponse
    {
        $this->requestStack->getSession()->remove('_admin_preview_mode');
        return $this->redirectToRoute('admin_dashboard');
    }
}
