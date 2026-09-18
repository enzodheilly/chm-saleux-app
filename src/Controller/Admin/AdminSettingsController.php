<?php

namespace App\Controller\Admin;

use App\Entity\SiteBannerMessage;
use App\Repository\SiteBannerMessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/gestion-chm-secrete-92x/settings', name: 'admin_settings_')]
#[IsGranted('ROLE_STAFF')]
class AdminSettingsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/settings/index.html.twig', [
            'title' => 'Mon compte',
        ]);
    }

    #[Route('/banner', name: 'banner_index', methods: ['GET'])]
    public function bannerIndex(SiteBannerMessageRepository $messageRepo): Response
    {
        return $this->render('admin/settings/banner.html.twig', [
            'title'    => 'Bandeau d\'annonce',
            'messages' => $messageRepo->findAllOrdered(),
        ]);
    }

    // ── Ancien endpoint conservé pour compatibilité (redirige vers index) ──
    #[Route('/banner', name: 'banner_update', methods: ['POST'])]
    public function updateBanner(): Response
    {
        return $this->redirectToRoute('admin_settings_banner_index');
    }

    // ── Ajouter un message ──
    #[Route('/banner/add', name: 'banner_add', methods: ['POST'])]
    public function bannerAdd(
        Request $request,
        SiteBannerMessageRepository $messageRepo,
        EntityManagerInterface $em
    ): Response {
        if (!$this->isCsrfTokenValid('banner_add', $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_settings_banner_index');
        }

        $text = trim((string) $request->request->get('text', ''));
        if ($text === '') {
            $this->addFlash('error', 'Le message ne peut pas être vide.');
            return $this->redirectToRoute('admin_settings_banner_index');
        }

        $msg = (new SiteBannerMessage())
            ->setText($text)
            ->setPosition($messageRepo->nextPosition())
            ->setIsActive(true);

        $em->persist($msg);
        $em->flush();

        $this->addFlash('success', 'Message ajouté.');
        return $this->redirectToRoute('admin_settings_banner_index');
    }

    // ── Supprimer un message ──
    #[Route('/banner/{id}/delete', name: 'banner_delete', methods: ['POST'])]
    public function bannerDelete(
        int $id,
        Request $request,
        SiteBannerMessageRepository $messageRepo,
        EntityManagerInterface $em
    ): Response {
        if (!$this->isCsrfTokenValid('banner_delete_' . $id, $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_settings_banner_index');
        }

        $msg = $messageRepo->find($id);
        if ($msg) {
            $em->remove($msg);
            $em->flush();
            $this->reorder($messageRepo, $em);
            $this->addFlash('success', 'Message supprimé.');
        }

        return $this->redirectToRoute('admin_settings_banner_index');
    }

    // ── Activer / désactiver un message ──
    #[Route('/banner/{id}/toggle', name: 'banner_toggle', methods: ['POST'])]
    public function bannerToggle(
        int $id,
        Request $request,
        SiteBannerMessageRepository $messageRepo,
        EntityManagerInterface $em
    ): Response {
        if (!$this->isCsrfTokenValid('banner_toggle_' . $id, $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_settings_banner_index');
        }

        $msg = $messageRepo->find($id);
        if ($msg) {
            $msg->setIsActive(!$msg->isActive());
            $em->flush();
        }

        return $this->redirectToRoute('admin_settings_banner_index');
    }

    // ── Monter / descendre un message ──
    #[Route('/banner/{id}/move/{direction}', name: 'banner_move', methods: ['POST'])]
    public function bannerMove(
        int $id,
        string $direction,
        Request $request,
        SiteBannerMessageRepository $messageRepo,
        EntityManagerInterface $em
    ): Response {
        if (!$this->isCsrfTokenValid('banner_move_' . $id, $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_settings_banner_index');
        }

        $all     = $messageRepo->findAllOrdered();
        $current = null;
        $index   = -1;

        foreach ($all as $i => $m) {
            if ($m->getId() === $id) {
                $current = $m;
                $index   = $i;
                break;
            }
        }

        if ($current === null) {
            return $this->redirectToRoute('admin_settings_banner_index');
        }

        $swapIndex = $direction === 'up' ? $index - 1 : $index + 1;

        if (isset($all[$swapIndex])) {
            $swap = $all[$swapIndex];
            $tmpPos = $current->getPosition();
            $current->setPosition($swap->getPosition());
            $swap->setPosition($tmpPos);
            $em->flush();
        }

        return $this->redirectToRoute('admin_settings_banner_index');
    }

    #[Route('/change-password', name: 'change_password', methods: ['POST'])]
    public function changePassword(
        Request $request,
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em
    ): Response {
        if (!$this->isCsrfTokenValid('change_password', $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_settings_index');
        }

        $user        = $this->getUser();
        $current     = (string) $request->request->get('current_password', '');
        $new         = (string) $request->request->get('new_password', '');
        $confirm     = (string) $request->request->get('confirm_password', '');

        if (!$hasher->isPasswordValid($user, $current)) {
            $this->addFlash('error', 'Mot de passe actuel incorrect.');
            return $this->redirectToRoute('admin_settings_index');
        }

        if (strlen($new) < 8) {
            $this->addFlash('error', 'Le nouveau mot de passe doit contenir au moins 8 caractères.');
            return $this->redirectToRoute('admin_settings_index');
        }

        if ($new !== $confirm) {
            $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
            return $this->redirectToRoute('admin_settings_index');
        }

        $user->setPassword($hasher->hashPassword($user, $new));
        $em->flush();

        $this->addFlash('success', 'Mot de passe mis à jour avec succès.');
        return $this->redirectToRoute('admin_settings_index');
    }

    private function reorder(SiteBannerMessageRepository $repo, EntityManagerInterface $em): void
    {
        $all = $repo->findAllOrdered();
        foreach ($all as $i => $m) {
            $m->setPosition($i);
        }
        $em->flush();
    }
}
