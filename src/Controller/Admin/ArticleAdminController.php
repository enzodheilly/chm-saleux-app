<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion-chm-secrete-92x/articles', name: 'admin_articles_')]
#[IsGranted('ROLE_STAFF')]
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
    public function new(Request $request, EntityManagerInterface $em, SystemLoggerService $logger): Response
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

                $newFilename = bin2hex(random_bytes(8)) . '.' . $photoFile->guessExtension();
                $photoFile->move($this->getParameter('uploads_directory'), $newFilename);
                $article->setPhoto($newFilename);
            }

            $em->persist($article);
            $em->flush();

            $logger->add(SystemLoggerService::TYPE_ADMIN, 'Création article : ' . $article->getTitle());
            $this->addFlash('success', 'Article créé avec succès !');

            return $this->redirectToRoute('admin_articles_index');
        }

        return $this->render('admin/articles/new.html.twig', [
            'title' => 'Créer un nouvel article',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Article $article, EntityManagerInterface $em, SystemLoggerService $logger): Response
    {
        if ($this->isCsrfTokenValid('delete' . $article->getId(), $request->request->get('_token'))) {
            $title = $article->getTitle();
            $em->remove($article);
            $em->flush();

            $logger->add(SystemLoggerService::TYPE_ADMIN, 'Suppression article : ' . $title);
            $this->addFlash('success', 'Article supprimé avec succès !');
        } else {
            $this->addFlash('error', 'Token invalide. Suppression impossible.');
        }

        return $this->redirectToRoute('admin_articles_index');
    }

    #[Route('/{id}/edit', name: 'edit')]
    public function edit(Request $request, Article $article, EntityManagerInterface $em, SystemLoggerService $logger): Response
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

                $oldPhoto = $article->getPhoto();
                if ($oldPhoto) {
                    $oldPath = $this->getParameter('uploads_directory') . '/' . $oldPhoto;
                    if (is_file($oldPath)) {
                        @unlink($oldPath);
                    }
                }

                $newFilename = bin2hex(random_bytes(8)) . '.' . $photoFile->guessExtension();
                $photoFile->move($this->getParameter('uploads_directory'), $newFilename);
                $article->setPhoto($newFilename);
            }

            $em->flush();

            $logger->add(SystemLoggerService::TYPE_ADMIN, 'Modification article : ' . $article->getTitle());
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
