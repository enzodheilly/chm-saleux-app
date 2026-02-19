<?php
// src/Controller/Admin/AdminContactController.php

namespace App\Controller\Admin;

use App\Entity\ContactMessage;
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
            throw $this->createAccessDeniedException('Invalid CSRF token.');
        }

        $responseText = $request->request->get('response');

        $user = $this->getUser();
        $adminName = $user ? $user->getFirstName() : 'Admin';

        if ($responseText) {
            $message->setResponse($responseText);
            $message->setResolvedBy($adminName);
            $message->setIsFromAdmin(true);

            $em->flush();

            $clientEmail = $message->getEmail();

            if ($clientEmail) {
                $email = (new Email())
                    ->from('support@tonsite.com')
                    ->to($clientEmail)
                    ->subject('Reply to your contact request')
                    ->html("
                        <p>Hello,</p>
                        <p>Here is our reply:</p>
                        <p><strong>" . nl2br(htmlspecialchars($responseText)) . "</strong></p>
                        <p>Best regards,<br>$adminName</p>
                    ");

                $mailer->send($email);
            }

            $this->addFlash('success', 'Reply saved and email sent to the client.');
        }

        return $this->redirectToRoute('admin_contact_index');
    }
}
