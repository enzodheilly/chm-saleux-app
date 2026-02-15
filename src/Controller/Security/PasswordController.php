<?php

namespace App\Controller\Security;

use App\Entity\NewsletterSubscriber;
use App\Entity\PasswordHistory; // ✅ Import
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface; // ✅ Import
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Service\SystemLoggerService;

class PasswordController extends AbstractController
{
    #[Route('/set-password', name: 'set_password')]
    public function setPassword(
        Request $request,
        UserPasswordHasherInterface $passwordHasher, // Pour hasher le nouveau
        PasswordHasherFactoryInterface $hasherFactory, // ✅ Pour vérifier l'historique
        EntityManagerInterface $em,
        ArticleRepository $articleRepository,
        SystemLoggerService $logger
    ) {
        $user = $this->getUser();

        if (!$user || !$user->getNeedsPassword()) {
            return $this->redirectToRoute('home');
        }

        $showModal = true;

        if ($request->isMethod('POST')) {
            $password = $request->request->get('password');
            $confirmPassword = $request->request->get('confirm_password');
            $acceptedTerms = $request->request->get('acceptedTerms');

            if (!$acceptedTerms) {
                $this->addFlash('error', 'Vous devez accepter les conditions générales.');
            } elseif (!$password || !$confirmPassword) {
                $this->addFlash('error', 'Veuillez remplir tous les champs.');
            } elseif ($password !== $confirmPassword) {
                $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
            } elseif (strlen($password) < 12) {
                $this->addFlash('error', 'Le mot de passe doit contenir au moins 12 caractères.');
            } else {

                // --- 🛡️ SÉCURITÉ : Vérification Historique ---
                // Même pour un "Set Password", on vérifie s'il ne remet pas un vieux mdp (cas d'un admin qui a reset le compte)
                $hasher = $hasherFactory->getPasswordHasher($user);

                // 1. Vérification 5 derniers
                $lastPasswords = $em->getRepository(PasswordHistory::class)->findBy(
                    ['user' => $user],
                    ['changedAt' => 'DESC'],
                    5
                );

                $isReused = false;
                foreach ($lastPasswords as $history) {
                    if ($hasher->verify($history->getPasswordHash(), $password)) {
                        $isReused = true;
                        break;
                    }
                }

                if ($isReused) {
                    $this->addFlash('error', 'Ce mot de passe a déjà été utilisé récemment.');
                } else {
                    // --- ✅ TOUT EST OK ---

                    // 1. Archiver l'ancien mdp temporaire s'il existe (pour pas qu'il le réutilise)
                    if ($user->getPassword()) {
                        $oldHistory = new PasswordHistory();
                        $oldHistory->setUser($user);
                        $oldHistory->setPasswordHash($user->getPassword());
                        $em->persist($oldHistory);
                    }

                    // 2. Mettre le nouveau
                    $user->setPassword($passwordHasher->hashPassword($user, $password));
                    $user->setNeedsPassword(false);
                    $em->flush();

                    // ✅ LOG
                    $logger->add('Sécurité', sprintf('L\'utilisateur %s a configuré son mot de passe initial.', $user->getEmail()));

                    $this->addFlash('success', 'Mot de passe configuré avec succès !');

                    return $this->redirectToRoute('home');
                }
            }
        }

        // 🔹 Préparation des variables pour la home page
        $articles = $articleRepository->findBy([], ['publishedAt' => 'DESC']);

        $isSubscribed = false;
        $subscriber = null;

        if ($user) {
            $subscriber = $em->getRepository(NewsletterSubscriber::class)
                ->findOneBy([
                    'email' => $user->getEmail(),
                    'isConfirmed' => true
                ]);
            $isSubscribed = $subscriber !== null;
        }

        return $this->render('0_home/index.html.twig', [
            'articles' => $articles,
            'isSubscribed' => $isSubscribed,
            'subscriber' => $subscriber,
            'showSetPasswordModal' => $showModal,
        ]);
    }
}
