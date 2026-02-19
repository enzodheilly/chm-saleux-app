<?php

// src/Controller/ContactController.php
namespace App\Controller\Front;

use App\Entity\ContactMessage;
use App\Service\SystemLoggerService;
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
        return $this->render('contact/contact.html.twig');
    }

    #[Route('/contact/submit', name: 'contact_submit', methods: ['POST'])]
    public function submit(
        Request $request,
        EntityManagerInterface $em,
        SystemLoggerService $logger
    ): Response {
        $lastName  = $request->request->get('lastName');
        $firstName = $request->request->get('firstName');
        $email     = $request->request->get('email');
        $phone     = $request->request->get('phone');
        $subject   = $request->request->get('subject');
        $content   = $request->request->get('content');

        $contact = new ContactMessage();
        $contact->setLastName($lastName);
        $contact->setFirstName($firstName);
        $contact->setEmail($email);
        $contact->setPhone($phone);
        $contact->setSubject($subject);
        $contact->setContent($content);

        // ✅ Link with the logged-in member (if any)
        if ($this->getUser()) {
            $contact->setUser($this->getUser());
        }

        $em->persist($contact);
        $em->flush();

        // ✅ System logs
        $logger->add(
            'Contact message',
            sprintf(
                'New message received from %s %s (%s). Subject: %s. Member: %s',
                $firstName,
                $lastName,
                $email,
                $subject ?: 'N/A',
                $this->getUser() ? 'YES' : 'NO (Visitor)'
            )
        );

        $this->addFlash('success', 'Your message has been sent successfully!');

        return $this->redirectToRoute('contact');
    }
}
