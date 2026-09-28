<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/gestion-chm-secrete-92x/users', name: 'admin_users_')]
#[IsGranted('ROLE_STAFF')]
class AdminUsersController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findBy([], ['id' => 'DESC']);
        return $this->render('admin/users/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher, SystemLoggerService $logger): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            $em->persist($user);
            $em->flush();

            $logger->add(SystemLoggerService::TYPE_ADMIN, 'Création utilisateur : ' . $user->getEmail());
            $this->addFlash('success', '✅ Utilisateur créé avec succès');
            return $this->redirectToRoute('admin_users_index');
        }

        return $this->render('admin/users/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // ✅ NOUVELLE ROUTE D'ÉDITION
    #[Route('/{id}/edit', name: 'edit')]
    public function edit(Request $request, User $user, EntityManagerInterface $em, UserPasswordHasherInterface $hasher, SystemLoggerService $logger): Response
    {
        // Cet écran est prévu pour gérer les comptes "utilisateurs" classiques.
        // Il ne doit jamais permettre à un simple ROLE_STAFF de modifier (et donc
        // de changer le mot de passe, voire d'écraser les rôles réels) un compte
        // qui a lui-même un accès staff/super-admin — seul un ROLE_SUPER_ADMIN
        // peut le faire (et doit passer par la gestion staff dédiée pour les
        // rôles admin, pas par ce formulaire qui ne connaît que ROLE_USER/ROLE_ADMIN).
        $targetRoles = $user->getRoles();
        $isTargetPrivileged = in_array('ROLE_STAFF', $targetRoles, true) || in_array('ROLE_SUPER_ADMIN', $targetRoles, true);
        if ($isTargetPrivileged && !$this->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('Seul un super-administrateur peut modifier un compte staff/admin.');
        }

        // UserType ne connaît que ROLE_USER/ROLE_ADMIN : sans précaution, soumettre
        // ce formulaire écraserait le tableau de rôles et ferait perdre ROLE_STAFF/
        // ROLE_SUPER_ADMIN à un compte qui les avait. On les préserve explicitement.
        $privilegedRolesBefore = array_intersect($targetRoles, ['ROLE_STAFF', 'ROLE_SUPER_ADMIN']);

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!empty($privilegedRolesBefore)) {
                $user->setRoles(array_values(array_unique([...$user->getRoles(), ...$privilegedRolesBefore])));
            }

            $newPassword = $form->get('password')->getData();
            if ($newPassword) {
                $hashed = $hasher->hashPassword($user, $newPassword);
                $user->setPassword($hashed);
            }

            $em->flush();

            $logger->add(SystemLoggerService::TYPE_ADMIN, 'Modification utilisateur : ' . $user->getEmail());
            $this->addFlash('success', '✅ Utilisateur modifié avec succès.');
            return $this->redirectToRoute('admin_users_index');
        }

        return $this->render('admin/users/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(User $user, Request $request, EntityManagerInterface $em, SystemLoggerService $logger): Response
    {
        $targetRoles = $user->getRoles();
        $isTargetPrivileged = in_array('ROLE_STAFF', $targetRoles, true) || in_array('ROLE_SUPER_ADMIN', $targetRoles, true);
        if ($isTargetPrivileged && !$this->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('Seul un super-administrateur peut supprimer un compte staff/admin.');
        }

        if (!$this->isCsrfTokenValid('delete' . $user->getId(), (string) $request->request->get('_token', ''))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_users_index');
        }

        $email = $user->getEmail();
        $em->remove($user);
        $em->flush();

        $logger->add(SystemLoggerService::TYPE_ADMIN, 'Suppression utilisateur : ' . $email);
        $this->addFlash('success', 'Utilisateur supprimé avec succès.');
        return $this->redirectToRoute('admin_users_index');
    }
}
