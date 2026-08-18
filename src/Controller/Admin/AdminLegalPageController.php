<?php
// src/Controller/Admin/AdminLegalPageController.php

namespace App\Controller\Admin;

use App\Entity\LegalPage;
use App\Form\LegalPageType;
use App\Repository\LegalPageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion-chm-secrete-92x/legal-pages', name: 'admin_legal_pages_')]
class AdminLegalPageController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(LegalPageRepository $legalPageRepository): Response
    {
        return $this->render('admin/legal_pages/index.html.twig', [
            'title' => 'Gestion des pages légales',
            'pages' => $legalPageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $page = new LegalPage();
        $form = $this->createForm(LegalPageType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($page);
            $em->flush();

            $this->addFlash('success', 'Page créée avec succès !');
            return $this->redirectToRoute('admin_legal_pages_index');
        }

        return $this->render('admin/legal_pages/form.html.twig', [
            'title' => 'Nouvelle page légale',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $em, LegalPage $page): Response
    {
        $form = $this->createForm(LegalPageType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Page mise à jour avec succès !');
            return $this->redirectToRoute('admin_legal_pages_index');
        }

        return $this->render('admin/legal_pages/edit.html.twig', [
            'title' => 'Modifier la page : ' . $page->getTitle(),
            'form' => $form->createView(),
            'page' => $page,
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, EntityManagerInterface $em, LegalPage $page): Response
    {
        if ($this->isCsrfTokenValid('delete' . $page->getId(), $request->request->get('_token'))) {
            $em->remove($page);
            $em->flush();
            $this->addFlash('success', 'Page supprimée avec succès.');
        }

        return $this->redirectToRoute('admin_legal_pages_index');
    }
}
