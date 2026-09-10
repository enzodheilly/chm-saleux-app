<?php

namespace App\Controller\Admin;

use App\Repository\SiteBannerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/gestion-chm-secrete-92x/settings', name: 'admin_settings_')]
#[IsGranted('ROLE_ADMIN')]
class AdminSettingsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SiteBannerRepository $bannerRepo): Response
    {
        return $this->render('admin/settings/index.html.twig', [
            'title'  => 'Paramètres du site',
            'banner' => $bannerRepo->findSingleton(),
        ]);
    }

    #[Route('/banner', name: 'banner_update', methods: ['POST'])]
    public function updateBanner(
        Request $request,
        SiteBannerRepository $bannerRepo,
        EntityManagerInterface $em
    ): Response {
        if (!$this->isCsrfTokenValid('update_banner', $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_settings_index');
        }

        $banner = $bannerRepo->findSingleton();
        if ($banner === null) {
            $this->addFlash('error', 'Bannière introuvable en base.');
            return $this->redirectToRoute('admin_settings_index');
        }

        $message  = trim((string) $request->request->get('message', ''));
        $isActive = (bool) $request->request->get('is_active', false);

        $banner->setMessage($message !== '' ? $message : null);
        $banner->setIsActive($isActive);
        $banner->setUpdatedAt(new \DateTimeImmutable());
        $em->flush();

        $this->addFlash('success', $isActive ? 'Bannière activée.' : 'Bannière désactivée.');
        return $this->redirectToRoute('admin_settings_index');
    }
}
