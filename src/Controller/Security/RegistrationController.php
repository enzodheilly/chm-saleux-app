<?php

namespace App\Controller\Security;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Service\SystemLoggerService;
use App\Service\TurnstileVerifierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class RegistrationController extends AbstractController
{
    private function isStrongPassword(string $password): bool
    {
        if (mb_strlen($password) < 10) return false;

        $blacklist = ['password', 'azerty', '123456', 'motdepasse', 'chmsaleux'];
        foreach ($blacklist as $banned) {
            if (str_contains(strtolower($password), $banned)) return false;
        }

        return true;
    }

    #[Route('/register', name: 'app_register', methods: ['GET', 'POST'])]
    public function register(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer,
        SystemLoggerService $logger,
        UserRepository $userRepo,
        TurnstileVerifierService $turnstile
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            try {
                // 1. Validation CSRF
                if (!$this->isCsrfTokenValid('register', $request->request->get('_token'))) {
                    $this->addFlash('error', 'Session invalide.');
                    return $this->render('security/register.html.twig', ['registrationForm' => $form->createView()]);
                }

                // 2. Validation Turnstile
                $turnstileResponse = (string) $request->request->get('cf-turnstile-response', '');
                if (!$turnstile->verify($turnstileResponse, $request->getClientIp())) {
                    $this->addFlash('error', 'La vérification anti-robot a échoué.');
                    return $this->render('security/register.html.twig', ['registrationForm' => $form->createView()]);
                }

                // 3. Récupération des données liées au formulaire
                $data = $request->request->all('registration_form');
                $passArray = $data['password'] ?? [];
                $password1 = (string) ($passArray['first'] ?? '');
                $password2 = (string) ($passArray['second'] ?? '');
                $accepted = (bool) ($data['acceptedTerms'] ?? false);

                // 4. Validations manuelles
                $errors = [];
                if (!$accepted) $errors[] = "Vous devez accepter les conditions générales.";
                if ($userRepo->findOneBy(['email' => $user->getEmail()])) {
                    $errors[] = "Cette adresse email est déjà utilisée.";
                }
                if ($password1 !== $password2) {
                    $errors[] = "Les mots de passe ne correspondent pas.";
                } elseif (!$this->isStrongPassword($password1)) {
                    $errors[] = "Votre mot de passe doit contenir au moins 10 caractères.";
                }

                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        $this->addFlash('error', $error);
                    }
                    return $this->render('security/register.html.twig', ['registrationForm' => $form->createView()]);
                }

                // 5. Création de l'utilisateur
                $user->setAcceptedTerms(true);
                $user->setPassword($passwordHasher->hashPassword($user, $password1));
                $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
                $user->setVerificationCode($code);
                $user->setVerificationCodeExpiresAt(new \DateTimeImmutable('+15 minutes'));
                $user->setRoles(['ROLE_USER']);
                $user->setIsVerified(false);

                $entityManager->persist($user);
                $entityManager->flush();

                // 6. Envoi Email avec template Twig
                $emailMessage = (new Email())
                    ->from('no-reply@chm-saleux.fr')
                    ->to($user->getEmail())
                    ->subject('Votre code de vérification - CHM Saleux')
                    ->html($this->renderView('emails/verify_code.html.twig', [
                        'firstName' => $user->getFirstName(),
                        'code' => $code,
                    ]));
                $mailer->send($emailMessage);

                $request->getSession()->set('verify_email', $user->getEmail());
                return $this->redirectToRoute('app_verify_code');
            } catch (\Throwable $e) {
                $logger->add('Erreur inscription', $e->getMessage());
                $this->addFlash('error', 'Une erreur serveur est survenue.');
            }
        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
