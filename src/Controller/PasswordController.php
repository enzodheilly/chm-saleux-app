<?php

namespace App\Controller;

use App\Entity\NewsletterSubscriber;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;

class PasswordController extends AbstractController
{
    #[Route('/set-password', name: 'set_password')]
    public function setPassword(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $em,
        ArticleRepository $articleRepository
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
                $user->setPassword($passwordHasher->hashPassword($user, $password));
                $user->setNeedsPassword(false);
                $em->flush();

                $this->addFlash('success', 'Mot de passe configuré avec succès !');

                return $this->redirectToRoute('home');
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
