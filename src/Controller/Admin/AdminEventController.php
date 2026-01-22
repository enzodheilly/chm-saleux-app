<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/event', name: 'admin_event_')]
class AdminEventController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EventRepository $eventRepo): Response
    {
        $events = $eventRepo->findAll();

        return $this->render('admin/event/event_index.html.twig', [
            'events' => $events,
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 📸 Gestion du fichier uploadé
            $uploadedFile = $form->get('imageFile')->getData();

            if ($uploadedFile) {
                $filename = uniqid() . '.' . $uploadedFile->guessExtension();

                $uploadedFile->move(
                    $this->getParameter('upload_dir'),
                    $filename
                );

                $event->setImage($filename);
            }

            $em->persist($event);
            $em->flush();

            $this->addFlash('success', 'Événement créé avec succès !');
            return $this->redirectToRoute('admin_event_index');
        }

        return $this->render('admin/event/event_new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/{id}/edit', name: 'edit')]
    public function edit(Event $event, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 📸 Gestion de la nouvelle image si fournie
            $uploadedFile = $form->get('imageFile')->getData();

            if ($uploadedFile) {
                $filename = uniqid() . '.' . $uploadedFile->guessExtension();

                $uploadedFile->move(
                    $this->getParameter('upload_dir'),
                    $filename
                );

                $event->setImage($filename);
            }

            $em->flush();

            $this->addFlash('success', 'Événement mis à jour avec succès !');
            return $this->redirectToRoute('admin_event_index');
        }

        return $this->render('admin/event/event_new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Event $event, Request $request, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $event->getId(), $request->request->get('_token'))) {
            $em->remove($event);
            $em->flush();
            $this->addFlash('success', 'Événement supprimé !');
        }

        return $this->redirectToRoute('admin_event_index');
    }
}
