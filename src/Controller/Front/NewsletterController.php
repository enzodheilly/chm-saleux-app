<?php

namespace App\Controller\Front;

use App\Entity\NewsletterSubscriber;
use App\Service\SystemLoggerService;
use App\Service\TurnstileVerifierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class NewsletterController extends AbstractController
{
    #[Route('/newsletter', name: 'newsletter_subscribe', methods: ['POST'])]
    public function subscribe(
        Request $request,
        EntityManagerInterface $em,
        MailerInterface $mailer,
        SystemLoggerService $logger,
        TurnstileVerifierService $turnstile
    ): Response {
        usleep(400000); // 🕓 Délai anti-bot léger

        $user = $this->getUser();
        $emailInput = $user ? $user->getEmail() : trim($request->request->get('email'));

        // 🧠 Validation e-mail
        if (!$emailInput || !filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
            return $this->json(['success' => false, 'message' => 'Adresse e-mail invalide.'], 400);
        }

        // 🔒 Vérif CSRF
        $submittedToken = $request->request->get('_csrf_token');
        if (!$this->isCsrfTokenValid('newsletter', $submittedToken)) {
            return $this->json(['success' => false, 'message' => 'Token CSRF invalide.'], 400);
        }

        // 🕵️‍♂️ Honeypot anti-bot
        if (!empty($request->request->get('nickname'))) {
            $logger->add('Tentative spam newsletter', sprintf('Bot détecté depuis IP %s.', $request->getClientIp()));
            return $this->json(['success' => false, 'message' => 'Requête refusée (spam détecté).'], 400);
        }

        // 🔁 Vérification d’abonnement existant AVANT CAPTCHA
        $existingSubscriber = $em->getRepository(NewsletterSubscriber::class)
            ->findOneBy(['email' => $emailInput]);

        if ($existingSubscriber) {
            if ($existingSubscriber->getIsConfirmed()) {
                // ✅ Déjà inscrit et confirmé
                return $this->json([
                    'success' => false,
                    'message' => 'Cette adresse est déjà abonnée à la newsletter.'
                ], 200);
            } else {
                // 🔁 Inscription non confirmée → renvoyer e-mail de confirmation
                return $this->resendConfirmation($existingSubscriber, $mailer, $logger);
            }
        }

        // 🧩 Vérification Turnstile (Cloudflare)
        $captchaToken = $request->request->get('cf-turnstile-response');
        if (!$turnstile->verify($captchaToken, $request->getClientIp())) {
            return $this->json([
                'success' => false,
                'message' => 'Échec de la vérification anti-robot. Merci de réessayer.'
            ], 400);
        }

        // ✍️ Nouvelle inscription
        $subscriber = new NewsletterSubscriber();
        $subscriber->setEmail($emailInput)
            ->setIsConfirmed(false)
            ->generateTokens(); // ✅ crée confirmationToken + unsubscribeToken

        if ($user) {
            $subscriber->setUser($user);
        }

        $em->persist($subscriber);
        $em->flush();

        // ✅ LOG : Nouvel abonné
        $logger->add('Newsletter', sprintf('Nouvelle inscription (en attente) : %s', $emailInput));

        // 📧 Envoi e-mail de confirmation
        $this->sendConfirmationEmail($subscriber, $mailer, $logger);

        return $this->json([
            'success' => true,
            'message' => 'Un e-mail de confirmation vient de vous être envoyé.'
        ]);
    }

    // =======================================================
    // 📨 RÉUTILISABLE : envoi du mail de confirmation
    // =======================================================
    private function sendConfirmationEmail(NewsletterSubscriber $subscriber, MailerInterface $mailer, SystemLoggerService $logger): void
    {
        try {
            $confirmUrl = $this->generateUrl(
                'newsletter_confirm',
                ['token' => $subscriber->getConfirmationToken()],
                UrlGeneratorInterface::ABSOLUTE_URL
            );

            $unsubscribeUrl = $subscriber->getUnsubscribeUrl();

            $email = (new TemplatedEmail())
                ->from('CHM Saleux <no-reply@chmsaleux.fr>')
                ->to($subscriber->getEmail())
                ->subject('Confirmez votre inscription à la newsletter')
                ->htmlTemplate('emails/confirm.html.twig')
                ->context([
                    'subscriber' => $subscriber,
                    'confirmUrl' => $confirmUrl,
                ]);

            // 📨 Headers Gmail / Outlook
            $email->getHeaders()
                ->addTextHeader('List-Unsubscribe', '<' . $unsubscribeUrl . '>')
                ->addTextHeader('List-Unsubscribe-Post', 'List-Unsubscribe=One-Click');

            $mailer->send($email);
        } catch (\Exception $e) {
            $logger->add('Erreur envoi e-mail newsletter', $e->getMessage());
        }
    }

    // =======================================================
    // 🔁 RÉUTILISABLE : renvoi du mail de confirmation
    // =======================================================
    private function resendConfirmation(NewsletterSubscriber $subscriber, MailerInterface $mailer, SystemLoggerService $logger): Response
    {
        $this->sendConfirmationEmail($subscriber, $mailer, $logger);

        return $this->json([
            'success' => true,
            'message' => 'Vous aviez déjà une inscription en attente. Un nouvel e-mail de confirmation vient d’être envoyé.'
        ]);
    }

    // =======================================================
    // ✅ CONFIRMATION
    // =======================================================
    #[Route('/newsletter/confirm/{token}', name: 'newsletter_confirm')]
    public function confirm(string $token, EntityManagerInterface $em, SystemLoggerService $logger): Response
    {
        $subscriber = $em->getRepository(NewsletterSubscriber::class)
            ->findOneBy(['confirmationToken' => $token]);

        if (!$subscriber) {
            $this->addFlash('error', 'Lien de confirmation invalide ou expiré.');
            return $this->redirectToRoute('home');
        }

        $subscriber->setIsConfirmed(true);
        $subscriber->setConfirmationToken(null);
        $em->flush();

        // ✅ LOG : Confirmation OK
        $logger->add('Newsletter', sprintf('Inscription confirmée pour %s', $subscriber->getEmail()));
        $this->addFlash('success', 'Votre abonnement à la newsletter a bien été confirmé !');

        return $this->redirectToRoute('home');
    }

    // =======================================================
    // 🚫 DÉSINSCRIPTION (Page de confirmation + Action)
    // =======================================================
    #[Route('/newsletter/unsubscribe/{token}', name: 'newsletter_unsubscribe', methods: ['GET', 'POST'])]
    public function unsubscribeByToken(
        string $token,
        Request $request,
        EntityManagerInterface $em,
        SystemLoggerService $logger
    ): Response {
        $subscriber = $em->getRepository(NewsletterSubscriber::class)
            ->findOneBy(['unsubscribeToken' => $token]);

        if (!$subscriber) {
            $this->addFlash('error', 'Lien de désabonnement invalide ou expiré.');
            return $this->redirectToRoute('home');
        }

        $email = $subscriber->getEmail();
        $user = $subscriber->getUser();
        $firstName = $user ? $user->getFirstName() : null;

        // SI L'UTILISATEUR CLIQUE SUR LE BOUTON (POST)
        if ($request->isMethod('POST')) {
            $em->remove($subscriber);
            $em->flush();

            $logger->add('Désinscription newsletter', sprintf('L’adresse %s s’est désinscrite.', $email));

            // On réaffiche la page mais avec un flag "success"
            return $this->render('emails/unsubscribed.html.twig', [
                'subscriberEmail' => $email,
                'firstName' => $firstName,
                'success' => true
            ]);
        }

        // SI L'UTILISATEUR ARRIVE DEPUIS LE MAIL (GET)
        return $this->render('emails/unsubscribed.html.twig', [
            'subscriberEmail' => $email,
            'firstName' => $firstName,
            'success' => false
        ]);
    }
}
