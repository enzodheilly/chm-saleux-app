<?php

namespace App\Controller\Front;

use App\Entity\ContactMessage;
use App\Service\SystemLoggerService;
use App\Service\TurnstileVerifierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        return $this->render('contact/contact.html.twig', [
            'subjectChoices' => ContactMessage::getSubjectChoices(),
        ]);
    }

    #[Route('/contact/submit', name: 'contact_submit', methods: ['POST'])]
    public function submit(
        Request $request,
        EntityManagerInterface $em,
        SystemLoggerService $logger,
        TurnstileVerifierService $turnstile
    ): Response {
        // 1. Validation CSRF
        if (!$this->isCsrfTokenValid('contact_submit', (string) $request->request->get('_token', ''))) {
            $this->addFlash('danger', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('contact');
        }

        // 2. Validation Cloudflare Turnstile (côté serveur)
        $turnstileResponse = $request->request->get('cf-turnstile-response');
        if (!$turnstile->verify($turnstileResponse, $request->getClientIp())) {
            $this->addFlash('danger', 'La vérification anti-robot a échoué. Veuillez réessayer.');
            return $this->redirectToRoute('contact');
        }

        // 3. Récupération des données
        $lastName  = trim((string) $request->request->get('lastName', ''));
        $firstName = trim((string) $request->request->get('firstName', ''));
        $email     = trim((string) $request->request->get('email', ''));
        $phone     = trim((string) $request->request->get('phone', ''));
        $subject   = trim((string) $request->request->get('subject', ''));
        $content   = trim((string) $request->request->get('content', ''));

        $allowedSubjects = array_values(ContactMessage::getSubjectChoices());
        if (!in_array($subject, $allowedSubjects, true)) {
            $subject = null;
        }

        // 4. Création de l'entité
        $contact = new ContactMessage();
        $contact->setLastName($lastName);
        $contact->setFirstName($firstName);
        $contact->setEmail($email);
        $contact->setPhone($phone !== '' ? $phone : null);
        $contact->setSubject($subject);
        $contact->setContent($content);

        if ($this->getUser()) {
            $contact->setUser($this->getUser());
        }

        $em->persist($contact);
        $em->flush();

        // 5. Log & Flash
        $logger->add(
            'Contact message',
            sprintf('New message from %s %s (%s). Subject: %s.', $firstName, $lastName, $email, $subject ?: 'N/A')
        );

        $this->addFlash('success', 'Votre message a bien été envoyé.');
        return $this->redirectToRoute('contact');
    }
}
