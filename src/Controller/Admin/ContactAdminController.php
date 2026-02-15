<?php
// src/Controller/Admin/ContactAdminController.php
namespace App\Controller\Admin;

use App\Entity\ContactMessage; // ✅ Ajouté
use App\Repository\ContactMessageRepository;
use Doctrine\ORM\EntityManagerInterface; // ✅ Ajouté
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/contact', name: 'admin_contact_')]
class ContactAdminController extends AbstractController
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
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $reponseText = $request->request->get('reponse');

        $user = $this->getUser();
        $adminName = $user ? $user->getFirstName() : 'Admin';

        if ($reponseText) {
            $message->setReponse($reponseText);
            $message->setResolvedBy($adminName);
            $message->setIsFromAdmin(true);

            $em->flush();

            $clientEmail = $message->getEmail();

            if ($clientEmail) {
                $email = (new Email())
                    ->from('support@tonsite.com')
                    ->to($clientEmail)
                    ->subject('Réponse à votre demande de contact')
                    ->html("
                    <p>Bonjour,</p>
                    <p>Voici notre réponse :</p>
                    <p><strong>" . nl2br(htmlspecialchars($reponseText)) . "</strong></p>
                    <p>Cordialement,<br>$adminName</p>
                ");

                $mailer->send($email);
            }

            $this->addFlash('success', 'Réponse enregistrée et mail envoyé au client.');
        }

        return $this->redirectToRoute('admin_contact_index');
    }
}
