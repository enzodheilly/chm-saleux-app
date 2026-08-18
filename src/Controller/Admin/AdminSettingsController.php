<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion-chm-secrete-92x/settings', name: 'admin_settings_')]
class AdminSettingsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/settings/index.html.twig', [
            'title' => 'Paramètres du site',
        ]);
    }
}
