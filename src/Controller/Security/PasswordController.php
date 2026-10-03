<?php

namespace App\Controller\Security;

use App\Entity\PasswordHistory;
use App\Entity\User;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class PasswordController extends AbstractController
{
    private function isStrongPassword(string $password): bool
    {
        if (mb_strlen($password) < 8) return false;
        if (!preg_match('/[A-Z]/', $password)) return false;
        if (!preg_match('/[a-z]/', $password)) return false;
        if (!preg_match('/\d/', $password)) return false;
        if (!preg_match('/[^A-Za-z0-9]/', $password)) return false;
        return true;
    }

    #[Route('/compte/definir-mot-de-passe', name: 'definir_mot_de_passe', methods: ['GET', 'POST'])]
    public function setPassword(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        PasswordHasherFactoryInterface $hasherFactory,
        EntityManagerInterface $em,
        SystemLoggerService $logger
    ): Response {
        /** @var User $user */
        $user = $this->getUser();

        // Sécurité : si pas de user ou pas besoin de finaliser son compte, on dégage
        if (!$user || !$user->getNeedsPassword()) {
            return $this->redirectToRoute('accueil');
        }

        // Compte créé via Google (aucun mot de passe local) : la finalisation
        // se limite à l'acceptation des CGU, un mot de passe ne servirait à
        // rien puisque l'utilisateur se connectera toujours via Google.
        $passwordRequired = $user->getPassword() !== null;

        if ($request->isMethod('POST')) {
            $submittedToken = (string) $request->request->get('_token', '');
            if (!$this->isCsrfTokenValid('definir_mot_de_passe', $submittedToken)) {
                $this->addFlash('error', 'Session expirée.');
                return $this->redirectToRoute('definir_mot_de_passe');
            }

            $acceptedTerms = $request->request->getBoolean('accepted_terms', false);
            $hasErrors = false;

            if (!$acceptedTerms) {
                $this->addFlash('error', 'Vous devez accepter les conditions générales.');
                $hasErrors = true;
            }

            if (!$passwordRequired) {
                // Compte Google : seule l'acceptation des CGU est requise.
                if (!$hasErrors) {
                    $user->setNeedsPassword(false);
                    $user->setAcceptedTerms(true);

                    $em->flush();

                    $logger->add('Sécurité', sprintf('CGU acceptées (compte Google) pour %s', $user->getEmail()));
                    $this->addFlash('success', 'Votre compte est finalisé !');

                    return $this->redirectToRoute('accueil');
                }
            } else {
                $password = (string) $request->request->get('password', '');
                $confirmPassword = (string) $request->request->get('confirm_password', '');

                if ($password === '' || $password !== $confirmPassword) {
                    $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
                    $hasErrors = true;
                }

                if (!$this->isStrongPassword($password)) {
                    $this->addFlash('error', 'Le mot de passe doit contenir au moins 8 caractères, avec une majuscule, une minuscule, un chiffre et un caractère spécial.');
                    $hasErrors = true;
                }

                if (!$hasErrors) {
                    $hasher = $hasherFactory->getPasswordHasher($user);

                    // Vérification contre le mot de passe actuel (non encore archivé)
                    if ($user->getPassword() && $hasher->verify($user->getPassword(), $password)) {
                        $this->addFlash('error', 'Ce mot de passe a déjà été utilisé récemment. Choisissez-en un différent.');
                        return $this->redirectToRoute('definir_mot_de_passe');
                    }

                    // Vérification historique
                    $lastPasswords = $em->getRepository(PasswordHistory::class)->findBy(
                        ['user' => $user],
                        ['changedAt' => 'DESC'],
                        5
                    );

                    foreach ($lastPasswords as $history) {
                        if ($hasher->verify($history->getPasswordHash(), $password)) {
                            $this->addFlash('error', 'Ce mot de passe a déjà été utilisé récemment. Choisissez-en un différent.');
                            return $this->redirectToRoute('definir_mot_de_passe');
                        }
                    }

                    // Sauvegarde du nouveau MDP
                    $user->setPassword($passwordHasher->hashPassword($user, $password));
                    $user->setNeedsPassword(false);
                    $user->setAcceptedTerms(true);

                    $em->flush();

                    $logger->add('Sécurité', sprintf('MDP initial configuré pour %s', $user->getEmail()));
                    $this->addFlash('success', 'Votre mot de passe est configuré !');

                    return $this->redirectToRoute('accueil');
                }
            }
        }

        return $this->render('security/set_password.html.twig', [
            'passwordRequired' => $passwordRequired,
        ]);
    }
}
