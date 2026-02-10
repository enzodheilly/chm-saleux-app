<?php
// src/Controller/Admin/ContactAdminController.php
namespace App\Controller\Admin;

use App\Entity\ContactMessage; // ✅ Ajouté
use App\Repository\ContactMessageRepository;
use Doctrine\ORM\EntityManagerInterface; // ✅ Ajouté
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
    public function reply(Request $request, ContactMessage $message, EntityManagerInterface $em): Response
    {
        $reponseText = $request->request->get('reponse');

        // Sécurité : on récupère le prénom de l'admin connecté
        $user = $this->getUser();
        $adminName = $user ? $user->getFirstName() : 'Admin';

        if ($reponseText) {
            $message->setReponse($reponseText);
            $message->setResolvedBy($adminName);
            $message->setIsFromAdmin(true);

            $em->flush();
            $this->addFlash('success', 'Réponse enregistrée et ticket résolu.');
        }

        // Attention : la route de redirection doit correspondre au name défini en haut (admin_contact_index)
        return $this->redirectToRoute('admin_contact_index');
    }
}
