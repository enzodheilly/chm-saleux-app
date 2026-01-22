<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class EventMailer
{
    public function __construct(
        private MailerInterface $mailer,
        private Environment $twig
    ) {}

    public function sendRegistrationEmail(string $to, $event)
    {
        $html = $this->twig->render('emails/event_registration.html.twig', [
            'event' => $event
        ]);

        $email = (new Email())
            ->from('no-reply@ton-domaine.fr')
            ->to($to)
            ->subject('Confirmation d’inscription – ' . $event->getTitle())
            ->html($html);

        $this->mailer->send($email);
    }

    public function sendUnregistrationEmail(string $to, $event)
    {
        $html = $this->twig->render('emails/event_unregistration.html.twig', [
            'event' => $event
        ]);

        $email = (new Email())
            ->from('no-reply@ton-domaine.fr')
            ->to($to)
            ->subject('Confirmation de désinscription – ' . $event->getTitle())
            ->html($html);

        $this->mailer->send($email);
    }

    public function sendPendingRegistrationEmail(string $to, $event, string $token)
    {
        $confirmUrl = $_ENV['APP_URL'] . '/events/confirm/' . $event->getId() . '/' . $token;

        $html = $this->twig->render('emails/event_pending.html.twig', [
            'event' => $event,
            'user' => $to,
            'status' => 'pending',
            'confirmUrl' => $confirmUrl,
        ]);

        $email = (new Email())
            ->from('no-reply@ton-domaine.fr')
            ->to($to)
            ->subject('Confirmation de votre inscription – ' . $event->getTitle())
            ->html($html);

        $this->mailer->send($email);
    }
}
