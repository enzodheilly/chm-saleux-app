<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Google\GoogleAuthenticatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_SUPER_ADMIN')]
class AdminManagementController extends AbstractController
{
    #[Route('/gestion-chm-secrete-92x/new-admin', name: 'admin_users_new_admin')]
    public function newAdmin(
        Request $request,
        UserRepository $userRepo,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher,
        GoogleAuthenticatorInterface $ga
    ): Response {

        if ($request->isMethod('POST')) {

            // ✅ Vérification CSRF
            $csrfToken = (string) $request->request->get('_token', '');
            if (!$this->isCsrfTokenValid('new_admin', $csrfToken)) {
                $this->addFlash('danger', 'Token CSRF invalide.');
                return $this->redirectToRoute('admin_users_new_admin');
            }

            $emailInput = trim((string) $request->request->get('email', ''));
            if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
                $this->addFlash('danger', 'Adresse email invalide.');
                return $this->redirectToRoute('admin_users_new_admin');
            }

            $user = $userRepo->findOneBy(['email' => $emailInput]);

            // --- CAS 1 : L'UTILISATEUR EXISTE DÉJÀ (PROMOTION) ---
            if ($user) {
                $roles = $user->getRoles();
                if (!in_array('ROLE_STAFF', $roles)) {
                    $roles[] = 'ROLE_STAFF';
                    $user->setRoles($roles);

                    if (!$user->getGoogleAuthenticatorSecret()) {
                        $user->setGoogleAuthenticatorSecret($ga->generateSecret());
                    }
                    $user->setIsTotpConfirmed(false);

                    $em->flush();
                    $this->addFlash('success', "Le compte existant ($emailInput) a été promu Administrateur.");
                } else {
                    $this->addFlash('warning', "Cet utilisateur est déjà administrateur.");
                }
            }

            // --- CAS 2 : NOUVEL UTILISATEUR (CRÉATION) ---
            else {
                $rawPassword = (string) $request->request->get('password', '');
                if (!$request->request->get('firstname') || $rawPassword === '') {
                    $this->addFlash('danger', "Pour un nouvel utilisateur, le nom et le mot de passe sont obligatoires.");
                    return $this->render('admin/user/new_admin.html.twig', [
                        'users' => $userRepo->findAll(),
                    ]);
                }

                if (mb_strlen($rawPassword) < 10) {
                    $this->addFlash('danger', "Le mot de passe doit contenir au moins 10 caractères.");
                    return $this->redirectToRoute('admin_users_new_admin');
                }

                $blacklist = ['password', 'azerty', '123456', 'motdepasse', 'chmsaleux', 'admin'];
                foreach ($blacklist as $banned) {
                    if (str_contains(strtolower($rawPassword), $banned)) {
                        $this->addFlash('danger', "Ce mot de passe est trop facile à deviner.");
                        return $this->redirectToRoute('admin_users_new_admin');
                    }
                }

                $user = new User();
                $user->setEmail($emailInput);
                $user->setFirstName($request->request->get('firstname'));
                $user->setLastName($request->request->get('lastname'));
                $user->setRoles(['ROLE_STAFF']);

                $password = $hasher->hashPassword($user, $rawPassword);
                $user->setPassword($password);

                $user->setGoogleAuthenticatorSecret($ga->generateSecret());
                $user->setIsTotpConfirmed(false);

                $em->persist($user);
                $em->flush();
                $this->addFlash('success', "Nouvel administrateur créé avec succès.");
            }

            return $this->redirectToRoute('admin_users_index');
        }

        return $this->render('admin/user/new_admin.html.twig', [
            'users' => $userRepo->findAll(),
        ]);
    }
}
