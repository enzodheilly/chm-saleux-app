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
        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $email = $request->request->get('email');
        $telephone = $request->request->get('telephone');
        $message = $request->request->get('message');

        $contact = new ContactMessage();
        $contact->setNom($nom);
        $contact->setPrenom($prenom);
        $contact->setEmail($email);
        $contact->setTelephone($telephone);
        $contact->setMessage($message);

        // ✅ LIEN AVEC L'ADHÉRENT CONNECTÉ
        // Si l'utilisateur est connecté, on attache son compte au message
        if ($this->getUser()) {
            $contact->setUser($this->getUser());
        }

        $em->persist($contact);
        $em->flush();

        // ✅ Enregistrement dans les logs système
        $logger->add(
            'Message de contact',
            sprintf(
                'Nouveau message reçu de %s %s (%s). Adhérent : %s',
                $prenom,
                $nom,
                $email,
                $this->getUser() ? 'OUI' : 'NON (Visiteur)'
            )
        );

        $this->addFlash('success', 'Votre message a bien été envoyé !');

        return $this->redirectToRoute('contact');
    }
}
