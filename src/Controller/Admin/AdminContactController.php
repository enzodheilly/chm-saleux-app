<?php
// src/Controller/Admin/AdminContactController.php

namespace App\Controller\Admin;

use App\Entity\ContactMessage;
use App\Entity\User;
use App\Repository\ContactMessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/contact', name: 'admin_contact_')]
class AdminContactController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ContactMessageRepository $repo): Response
    {
        $messages = $repo->findBy([], ['createdAt' => 'DESC']);

        return $this->render('admin/contact/index.html.twig', [
            'messages' => $messages,
            'subjectLabels' => [
                'renseignement' => 'Renseignements généraux',
                'essai' => 'Séance d\'essai',
                'tarifs' => 'Tarifs & inscription',
                'horaires' => 'Horaires du club',
                'coaching' => 'Coaching / accompagnement',
                'competitions' => 'Compétitions & résultats',
                'partenariat' => 'Partenariat',
                'technique' => 'Problème technique',
                'autre' => 'Autre demande',
            ],
        ]);
    }

    #[Route('/{id}/reply', name: 'reply', methods: ['POST'])]
    public function reply(
        Request $request,
        ContactMessage $message,
        EntityManagerInterface $em,
        MailerInterface $mailer
    ): Response {
        $token = $request->request->get('_token');

        if (!$this->isCsrfTokenValid('reply' . $message->getId(), $token)) {
            throw $this->createAccessDeniedException('Jeton CSRF invalide.');
        }

        $responseText = trim((string) $request->request->get('response', ''));

        $securityUser = $this->getUser();
        $user = $securityUser instanceof User ? $securityUser : null;

        $adminName = $user && $user->getFirstName()
            ? $user->getFirstName()
            : 'Admin';

        if ($responseText !== '') {
            $message->setResponse($responseText);
            $message->setResolvedBy($adminName);
            $message->setIsFromAdmin(true);

            $em->flush();

            $clientEmail = $message->getEmail();

            if ($clientEmail) {
                $email = (new Email())
                    ->from('support@tonsite.com')
                    ->to($clientEmail)
                    ->subject('Réponse à votre demande de contact')
                    ->html(
                        '
                        <p>Bonjour,</p>
                        <p>Nous avons bien pris en compte votre demande et voici notre réponse :</p>
                        <p><strong>' . nl2br(htmlspecialchars($responseText, ENT_QUOTES, 'UTF-8')) . '</strong></p>
                        <p>Cordialement,<br>' . htmlspecialchars($adminName, ENT_QUOTES, 'UTF-8') . '</p>
                        '
                    );

                $mailer->send($email);
            }

            $this->addFlash('success', 'La réponse a bien été enregistrée et envoyée au client.');
        } else {
            $this->addFlash('warning', 'Le champ de réponse est vide.');
        }

        return $this->redirectToRoute('admin_contact_index');
    }
}
