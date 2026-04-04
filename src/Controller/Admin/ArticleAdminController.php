<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/articles', name: 'admin_articles_')]
class ArticleAdminController extends AbstractController
{
    private const ALLOWED_MIMES = ['image/jpeg', 'image/png', 'image/webp'];
    private const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2 Mo

    #[Route('/', name: 'index')]
    public function index(ArticleRepository $articleRepo): Response
    {
        $articles = $articleRepo->findBy([], ['publishedAt' => 'DESC']);

        return $this->render('admin/articles/index.html.twig', [
            'title' => 'Gestion des articles',
            'articles' => $articles,
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoFile = $form->get('photo')->getData();
            if ($photoFile) {
                if (!in_array($photoFile->getMimeType(), self::ALLOWED_MIMES)) {
                    $this->addFlash('error', 'Format non autorisé (JPEG, PNG, WebP uniquement).');
                    return $this->redirectToRoute('admin_articles_new');
                }

                if ($photoFile->getSize() > self::MAX_FILE_SIZE) {
                    $this->addFlash('error', 'Fichier trop volumineux (max 2 Mo).');
                    return $this->redirectToRoute('admin_articles_new');
                }

                $newFilename = uniqid() . '.' . $photoFile->guessExtension();
                $photoFile->move($this->getParameter('uploads_directory'), $newFilename);
                $article->setPhoto($newFilename);
            }

            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'Article créé avec succès !');

            return $this->redirectToRoute('admin_articles_index');
        }

        return $this->render('admin/articles/new.html.twig', [
            'title' => 'Créer un nouvel article',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Article $article, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $article->getId(), $request->request->get('_token'))) {
            $em->remove($article);
            $em->flush();

            $this->addFlash('success', 'Article supprimé avec succès !');
        } else {
            $this->addFlash('error', 'Token invalide. Suppression impossible.');
        }

        return $this->redirectToRoute('admin_articles_index');
    }

    #[Route('/{id}/edit', name: 'edit')]
    public function edit(Request $request, Article $article, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoFile = $form->get('photo')->getData();
            if ($photoFile) {
                if (!in_array($photoFile->getMimeType(), self::ALLOWED_MIMES)) {
                    $this->addFlash('error', 'Format non autorisé (JPEG, PNG, WebP uniquement).');
                    return $this->redirectToRoute('admin_articles_edit', ['id' => $article->getId()]);
                }

                if ($photoFile->getSize() > self::MAX_FILE_SIZE) {
                    $this->addFlash('error', 'Fichier trop volumineux (max 2 Mo).');
                    return $this->redirectToRoute('admin_articles_edit', ['id' => $article->getId()]);
                }

                $newFilename = uniqid() . '.' . $photoFile->guessExtension();
                $photoFile->move($this->getParameter('uploads_directory'), $newFilename);
                $article->setPhoto($newFilename);
            }

            $em->flush();

            $this->addFlash('success', 'Article mis à jour avec succès !');
            return $this->redirectToRoute('admin_articles_index');
        }

        return $this->render('admin/articles/edit.html.twig', [
            'title' => 'Modifier l\'article',
            'form' => $form->createView(),
            'article' => $article
        ]);
    }
}
