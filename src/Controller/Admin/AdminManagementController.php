<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Google\GoogleAuthenticatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminManagementController extends AbstractController
{
    #[Route('/admin/new-admin', name: 'admin_users_new_admin')]
    public function newAdmin(
        Request $request,
        UserRepository $userRepo,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher,
        GoogleAuthenticatorInterface $ga
    ): Response {

        if ($request->isMethod('POST')) {
            $emailInput = $request->request->get('email');
            $user = $userRepo->findOneBy(['email' => $emailInput]);

            // --- CAS 1 : L'UTILISATEUR EXISTE DÉJÀ (PROMOTION) ---
            if ($user) {
                // On ajoute simplement le rôle ADMIN
                $roles = $user->getRoles();
                if (!in_array('ROLE_ADMIN', $roles)) {
                    $roles[] = 'ROLE_ADMIN';
                    $user->setRoles($roles);

                    // On active la 2FA (génération du secret)
                    if (!$user->getGoogleAuthenticatorSecret()) {
                        $user->setGoogleAuthenticatorSecret($ga->generateSecret());
                    }
                    // Force le scan du QR Code à la prochaine connexion
                    $user->setIsTotpConfirmed(false);

                    $em->flush();
                    $this->addFlash('success', "Le compte existant ($emailInput) a été promu Administrateur.");
                } else {
                    $this->addFlash('warning', "Cet utilisateur est déjà administrateur.");
                }
            }

            // --- CAS 2 : NOUVEL UTILISATEUR (CRÉATION) ---
            else {
                // On vérifie que les champs obligatoires pour une création sont là
                if (!$request->request->get('password') || !$request->request->get('firstname')) {
                    $this->addFlash('danger', "Pour un nouvel utilisateur, le nom et le mot de passe sont obligatoires.");
                    // On renvoie vers le formulaire avec les utilisateurs pour la liste
                    return $this->render('admin/user/new_admin.html.twig', [
                        'users' => $userRepo->findAll()
                    ]);
                }

                $user = new User();
                $user->setEmail($emailInput);
                $user->setFirstName($request->request->get('firstname'));
                $user->setLastName($request->request->get('lastname'));
                $user->setRoles(['ROLE_ADMIN']);

                $password = $hasher->hashPassword($user, $request->request->get('password'));
                $user->setPassword($password);

                $user->setGoogleAuthenticatorSecret($ga->generateSecret());
                $user->setIsTotpConfirmed(false); // Force le scan

                $em->persist($user);
                $em->flush();
                $this->addFlash('success', "Nouvel administrateur créé avec succès.");
            }

            return $this->redirectToRoute('admin_users_index');
        }

        // On passe la liste de tous les users pour l'autocomplétion
        return $this->render('admin/user/new_admin.html.twig', [
            'users' => $userRepo->findAll()
        ]);
    }
}
