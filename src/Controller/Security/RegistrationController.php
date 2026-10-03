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
        if (mb_strlen($password) < 8) return false;
        if (!preg_match('/[A-Z]/', $password)) return false;
        if (!preg_match('/[a-z]/', $password)) return false;
        if (!preg_match('/\d/', $password)) return false;
        if (!preg_match('/[^A-Za-z0-9]/', $password)) return false;
        return true;
    }

    /**
     * Vérifie que le domaine de l'email peut effectivement recevoir des
     * emails (enregistrement DNS MX, ou à défaut un enregistrement A —
     * RFC 5321 §5.1 autorise ce repli). Ça ne garantit pas que la boîte
     * mail précise existe, mais ça élimine les domaines inventés
     * (ex: "exemple@test.fr") qui passeraient la simple validation de
     * format Assert\Email. checkdnsrr() nécessite un accès réseau sortant
     * (DNS) : si ce n'est pas disponible (environnement de dev/CI isolé),
     * on n'échoue pas la vérification pour ne pas bloquer les tests.
     */
    private function hasDeliverableEmailDomain(string $email): bool
    {
        $atPos = strrpos($email, '@');
        if ($atPos === false) {
            return false;
        }

        $domain = substr($email, $atPos + 1);
        if ($domain === '') {
            return false;
        }

        if (!function_exists('checkdnsrr')) {
            return true;
        }

        return checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A');
    }

    #[Route('/inscription', name: 'app_register', methods: ['GET', 'POST'])]
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

                // Normalisation de l'email (cohérent avec GoogleAuthenticator,
                // qui normalise déjà l'email reçu de Google) : évite qu'une
                // différence de casse ("Nom@Gmail.com" vs "nom@gmail.com")
                // ne passe entre les mailles de la vérification de doublon.
                $user->setEmail(mb_strtolower(trim($user->getEmail())));

                $errors = [];
                if (!$accepted) $errors[] = "Vous devez accepter les conditions générales.";

                if (!$this->hasDeliverableEmailDomain($user->getEmail())) {
                    $errors[] = "L'adresse email saisie semble invalide : son domaine ne peut pas recevoir d'emails. Vérifiez qu'il n'y a pas de faute de frappe.";
                }

                $existingUser = $userRepo->findOneByEmailCaseInsensitive($user->getEmail());
                if ($existingUser instanceof User) {
                    $errors[] = $existingUser->getPassword() === null
                        ? "Cette adresse email utilise déjà une autre méthode de connexion. Utilisez le bouton \"Continuer avec Google\" pour accéder à votre compte."
                        : "Cette adresse email est déjà utilisée.";
                }
                if ($password1 !== $password2) {
                    $errors[] = "Les mots de passe ne correspondent pas.";
                } elseif (!$this->isStrongPassword($password1)) {
                    $errors[] = "Le mot de passe doit contenir au moins 8 caractères, avec une majuscule, une minuscule, un chiffre et un caractère spécial.";
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

                $logger->add(SystemLoggerService::TYPE_SECURITE, 'Nouvelle inscription : ' . $user->getEmail(), $user->getEmail());

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
                $logger->add(SystemLoggerService::TYPE_SECURITE, 'Erreur inscription : ' . $e->getMessage(), null, false);
                $this->addFlash('error', 'Une erreur serveur est survenue.');
            }
        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
