<?php

namespace App\Controller\Admin;

use App\Entity\BlockedMember;
use App\Repository\BlockedMemberRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Gestion des personnes interdites de reprise de licence en ligne (mauvais
 * payeurs, exclusions disciplinaires...). Voir BlockedMemberRepository::isBlocked
 * pour le rapprochement effectué côté formulaire public.
 */
#[Route('/gestion-chm-secrete-92x/adherents-bloques', name: 'admin_blocked_members_')]
#[IsGranted('ROLE_STAFF')]
class AdminBlockedMembersController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(BlockedMemberRepository $repo): Response
    {
        return $this->render('admin/blocked_members/index.html.twig', [
            'blockedMembers' => $repo->findAllOrdered(),
        ]);
    }

    #[Route('/ajouter', name: 'create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em, SystemLoggerService $logger): Response
    {
        if (!$this->isCsrfTokenValid('blocked_member_create', (string) $request->request->get('_token', ''))) {
            $this->addFlash('danger', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_blocked_members_index');
        }

        $nom = trim((string) $request->request->get('nom', ''));
        $prenom = trim((string) $request->request->get('prenom', ''));
        $raison = trim((string) $request->request->get('raison', ''));

        if ($nom === '' || $prenom === '') {
            $this->addFlash('danger', 'Le nom et le prénom sont obligatoires.');
            return $this->redirectToRoute('admin_blocked_members_index');
        }

        $blocked = new BlockedMember();
        $blocked->setNom($nom);
        $blocked->setPrenom($prenom);
        $blocked->setRaison($raison !== '' ? $raison : null);
        $blocked->setBlockedBy($this->getUser()?->getUserIdentifier());

        $em->persist($blocked);
        $em->flush();

        $logger->add(SystemLoggerService::TYPE_ADMIN, sprintf(
            'Adhérent bloqué (prise de licence en ligne) : %s %s',
            $prenom,
            $nom
        ));

        $this->addFlash('success', sprintf('%s %s a été ajouté à la liste des personnes bloquées.', $prenom, $nom));
        return $this->redirectToRoute('admin_blocked_members_index');
    }

    #[Route('/{id}/supprimer', name: 'delete', methods: ['POST'])]
    public function delete(BlockedMember $blockedMember, Request $request, EntityManagerInterface $em, SystemLoggerService $logger): Response
    {
        if (!$this->isCsrfTokenValid('delete' . $blockedMember->getId(), (string) $request->request->get('_token', ''))) {
            $this->addFlash('danger', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_blocked_members_index');
        }

        $logger->add(SystemLoggerService::TYPE_ADMIN, sprintf(
            'Déblocage : %s %s retiré de la liste des personnes bloquées',
            $blockedMember->getPrenom(),
            $blockedMember->getNom()
        ));

        $em->remove($blockedMember);
        $em->flush();

        $this->addFlash('success', 'Retiré de la liste des personnes bloquées.');
        return $this->redirectToRoute('admin_blocked_members_index');
    }
}
