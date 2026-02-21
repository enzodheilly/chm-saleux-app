<?php

namespace App\Controller\Security;

use App\Entity\NewsletterSubscriber;
use App\Entity\PasswordHistory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Service\SystemLoggerService;

class PasswordController extends AbstractController
{
    private function isStrongPassword(string $password): bool
    {
        if (mb_strlen($password) < 12) return false;
        if (!preg_match('/[A-Z]/', $password)) return false;
        if (!preg_match('/[a-z]/', $password)) return false;
        if (!preg_match('/\d/', $password)) return false;
        if (!preg_match('/[^A-Za-z0-9]/', $password)) return false;
        return true;
    }

    #[Route('/set-password', name: 'set_password', methods: ['GET', 'POST'])]
    public function setPassword(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        PasswordHasherFactoryInterface $hasherFactory,
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
            $submittedToken = (string) $request->request->get('_token', '');
            if (!$this->isCsrfTokenValid('set_password', $submittedToken)) {
                $this->addFlash('error', 'Session invalide. Veuillez réessayer.');
                return $this->redirectToRoute('set_password');
            }

            $password = (string) $request->request->get('password', '');
            $confirmPassword = (string) $request->request->get('confirm_password', '');
            $acceptedTerms = $request->request->getBoolean('acceptedTerms', false);

            if (!$acceptedTerms) {
                $this->addFlash('error', 'Vous devez accepter les conditions générales.');
            } elseif ($password === '' || $confirmPassword === '') {
                $this->addFlash('error', 'Veuillez remplir tous les champs.');
            } elseif ($password !== $confirmPassword) {
                $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
            } elseif (!$this->isStrongPassword($password)) {
                $this->addFlash('error', 'Mot de passe trop faible (12+ caractères, majuscule, minuscule, chiffre, spécial).');
            } else {
                $hasher = $hasherFactory->getPasswordHasher($user);

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

                if ($user->getPassword()) {
                    $oldHistory = new PasswordHistory();
                    $oldHistory->setUser($user);
                    $oldHistory->setPasswordHash($user->getPassword());
                    $em->persist($oldHistory);
                }

                $user->setPassword($passwordHasher->hashPassword($user, $password));
                $user->setNeedsPassword(false);
                $user->setAcceptedTerms(true);

                $em->flush();

                $logger->add('Sécurité', sprintf(
                    'L\'utilisateur %s a configuré son mot de passe initial. (IP: %s)',
                    $user->getEmail(),
                    $request->getClientIp()
                ));

                $this->addFlash('success', 'Mot de passe configuré avec succès !');
                return $this->redirectToRoute('home');
            }
        }

        $articles = $articleRepository->findBy([], ['publishedAt' => 'DESC']);

        $isSubscribed = false;
        $subscriber = null;

        $subscriber = $em->getRepository(NewsletterSubscriber::class)->findOneBy([
            'email' => $user->getEmail(),
            'isConfirmed' => true,
        ]);
        $isSubscribed = $subscriber !== null;

        return $this->render('0_home/index.html.twig', [
            'articles' => $articles,
            'isSubscribed' => $isSubscribed,
            'subscriber' => $subscriber,
            'showSetPasswordModal' => $showModal,
        ]);
    }
}
