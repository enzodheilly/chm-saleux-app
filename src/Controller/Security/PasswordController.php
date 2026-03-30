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
        // Longueur minimum
        if (mb_strlen($password) < 10) return false;

        // Bloquer les mots de passe trop courants
        $blacklist = ['password', 'azerty', '123456', 'motdepasse', 'chmsaleux'];
        foreach ($blacklist as $banned) {
            if (str_contains(strtolower($password), $banned)) return false;
        }

        return true;
    }

    #[Route('/set-password', name: 'set_password', methods: ['GET', 'POST'])]
    public function setPassword(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        PasswordHasherFactoryInterface $hasherFactory,
        EntityManagerInterface $em,
        SystemLoggerService $logger
    ): Response {
        /** @var User $user */
        $user = $this->getUser();

        // Sécurité : si pas de user ou pas besoin de mot de passe, on dégage
        if (!$user || !$user->getNeedsPassword()) {
            return $this->redirectToRoute('home');
        }

        if ($request->isMethod('POST')) {
            $submittedToken = (string) $request->request->get('_token', '');
            if (!$this->isCsrfTokenValid('set_password', $submittedToken)) {
                $this->addFlash('error', 'Session expirée.');
                return $this->redirectToRoute('set_password');
            }

            $password = (string) $request->request->get('password', '');
            $confirmPassword = (string) $request->request->get('confirm_password', '');
            $acceptedTerms = $request->request->getBoolean('accepted_terms', false);

            $hasErrors = false;

            if (!$acceptedTerms) {
                $this->addFlash('error', 'Vous devez accepter les conditions générales.');
                $hasErrors = true;
            }

            if ($password === '' || $password !== $confirmPassword) {
                $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
                $hasErrors = true;
            }

            if (!$this->isStrongPassword($password)) {
                $this->addFlash('error', 'Votre mot de passe doit contenir au moins 10 caractères.');
                $hasErrors = true;
            }

            if (!$hasErrors) {
                $hasher = $hasherFactory->getPasswordHasher($user);

                // Vérification historique
                $lastPasswords = $em->getRepository(PasswordHistory::class)->findBy(
                    ['user' => $user],
                    ['changedAt' => 'DESC'],
                    5
                );

                foreach ($lastPasswords as $history) {
                    if ($hasher->verify($history->getPasswordHash(), $password)) {
                        $this->addFlash('error', 'Ce mot de passe a déjà été utilisé récemment.');
                        return $this->redirectToRoute('set_password');
                    }
                }

                // Sauvegarde du nouveau MDP
                $user->setPassword($passwordHasher->hashPassword($user, $password));
                $user->setNeedsPassword(false);
                $user->setAcceptedTerms(true);

                $em->flush();

                $logger->add('Sécurité', sprintf('MDP initial configuré pour %s', $user->getEmail()));
                $this->addFlash('success', 'Votre mot de passe est configuré !');

                return $this->redirectToRoute('home');
            }
        }

        // 🚀 Au lieu de rendre '0_home/index.html.twig', on rend une page dédiée
        return $this->render('security/set_password.html.twig');
    }
}
