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

    #[Route('/admin/apercu/activer', name: 'admin_apercu_activer')]
    public function enablePreview(): RedirectResponse
    {
        $this->requestStack->getSession()->set('_admin_preview_mode', true);
        return $this->redirect('/');
    }

    #[Route('/admin/apercu/desactiver', name: 'admin_apercu_desactiver')]
    public function disablePreview(): RedirectResponse
    {
        $this->requestStack->getSession()->remove('_admin_preview_mode');
        return $this->redirectToRoute('admin_accueil');
    }
}
