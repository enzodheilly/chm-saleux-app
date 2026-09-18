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
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
