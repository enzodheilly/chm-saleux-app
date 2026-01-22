<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\PasswordHistory;
use App\Repository\PasswordHistoryRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class ResetPasswordController extends AbstractController
{
    #[Route('/reset-password', name: 'app_reset_password_request', methods: ['POST'])]
    public function request(
        Request $request,
        EntityManagerInterface $em,
        MailerInterface $mailer,
        SystemLoggerService $logger,
        Environment $twig  // ✅ Injection de Twig
    ): Response {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'] ?? null;

        if (!$email) {
            return $this->json([
                'success' => false,
                'message' => '⚠️ Email manquant.'
            ], 400);
        }

        $user = $em->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($user) {
            $now = new \DateTimeImmutable();
            $lastRequest = $user->getLastResetRequestAt();

            if ($lastRequest && $lastRequest > $now->modify('-60 seconds')) {
                return $this->json([
                    'success' => false,
                    'message' => 'Veuillez patienter avant une nouvelle demande.'
                ], 429);
            }

            $token = Uuid::v4()->toRfc4122();
            $user->setResetToken($token);
            $user->setResetTokenExpiresAt($now->modify('+1 hour'));
            $user->setLastResetRequestAt($now);
            $em->flush();

            // URL de réinitialisation
            $resetUrl = $this->generateUrl('app_reset_password', ['token' => $token], 0); // URL absolue

            // ✅ Contenu du mail via Twig
            $htmlContent = $twig->render('emails/reset_password.html.twig', [
                'user' => $user,
                'resetUrl' => $resetUrl
            ]);

            $emailMessage = (new Email())
                ->from('no-reply@monsite.com')
                ->to($user->getEmail())
                ->subject('Réinitialisation de votre mot de passe')
                ->html($htmlContent);

            $mailer->send($emailMessage);
            $logger->add('Demande de réinitialisation', sprintf('Lien envoyé à %s', $user->getEmail()));
        }

        return $this->json([
            'success' => true,
            'message' => 'Un mail vous a été envoyé pour réinitialiser votre mot de passe.'
        ]);
    }

    #[Route('/reset-password/{token}', name: 'app_reset_password', methods: ['GET'])]
    public function redirectToModal(string $token): Response
    {
        return $this->redirect('/?resetToken=' . urlencode($token));
    }

    #[Route('/api/reset-password-final', name: 'app_reset_password_final', methods: ['POST'])]
    public function resetPasswordFinal(
        Request $request,
        EntityManagerInterface $em,
        SystemLoggerService $logger,
        PasswordHistoryRepository $passwordHistoryRepo,
        PasswordHasherFactoryInterface $passwordHasherFactory
    ): Response {
        $data = json_decode($request->getContent(), true);
        $token = $data['token'] ?? null;
        $newPassword = $data['password'] ?? null;

        if (!$token || !$newPassword) {
            return $this->json(['success' => false, 'message' => 'Paramètres manquants.'], 400);
        }

        $user = $em->getRepository(User::class)->findOneBy(['resetToken' => $token]);
        if (!$user || $user->getResetTokenExpiresAt() < new \DateTimeImmutable()) {
            return $this->json(['success' => false, 'message' => 'Lien invalide ou expiré.'], 400);
        }

        $hasher = $passwordHasherFactory->getPasswordHasher($user);
        $lastPasswords = $passwordHistoryRepo->findLast($user, 5);

        foreach ($lastPasswords as $history) {
            if ($hasher->verify($history->getPasswordHash(), $newPassword)) {
                return $this->json([
                    'success' => false,
                    'message' => 'Ce mot de passe a déjà été utilisé récemment. Veuillez en choisir un autre.'
                ], 400);
            }
        }

        if ($user->getPassword()) {
            $oldHistory = new PasswordHistory();
            $oldHistory->setUser($user);
            $oldHistory->setPasswordHash($user->getPassword());
            $em->persist($oldHistory);
        }

        $newHash = $hasher->hash($newPassword);
        $user->setPassword($newHash);
        $user->setResetToken(null);
        $user->setResetTokenExpiresAt(null);
        $user->setLastResetRequestAt(null);

        $em->flush();
        $passwordHistoryRepo->pruneOldPasswords($user);

        $logger->add(
            'Changement de mot de passe',
            sprintf('Le mot de passe de %s a été modifié avec succès.', $user->getEmail())
        );

        return $this->json(['success' => true]);
    }
}
