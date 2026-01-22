<?php

namespace App\Controller\Admin;

use App\Entity\Athlete;
use App\Form\AthleteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/admin/athlete')]
class AdminAthleteController extends AbstractController
{
    #[Route('/', name: 'admin_athlete_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $athletes = $em->getRepository(Athlete::class)->findAll();
        return $this->render('admin/athlete/index.html.twig', compact('athletes'));
    }

    #[Route('/new', name: 'admin_athlete_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $athlete = new Athlete();
        $form = $this->createForm(AthleteType::class, $athlete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $newFilename = uniqid() . '.' . $imageFile->guessExtension();
                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir') . '/athletes',
                        $newFilename
                    );
                    $athlete->setImage($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors de l\'upload de l\'image.');
                }
            }

            $em->persist($athlete);
            $em->flush();

            $this->addFlash('success', 'Athlète créé avec succès !');
            return $this->redirectToRoute('admin_athlete_index');
        }

        return $this->render('admin/athlete/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_athlete_edit', methods: ['GET', 'POST'])]
    public function edit(Athlete $athlete, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(AthleteType::class, $athlete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $newFilename = uniqid() . '.' . $imageFile->guessExtension();
                try {
                    $imageFile->move(
                        $this->getParameter('upload_dir') . '/athletes',
                        $newFilename
                    );
                    $athlete->setImage($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors de l\'upload de l\'image.');
                }
            }

            $em->flush();
            $this->addFlash('success', 'Athlète modifié avec succès !');
            return $this->redirectToRoute('admin_athlete_index');
        }

        return $this->render('admin/athlete/edit.html.twig', [
            'form' => $form->createView(),
            'athlete' => $athlete,
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_athlete_delete', methods: ['POST'])]
    public function delete(Athlete $athlete, Request $request, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $athlete->getId(), $request->request->get('_token'))) {
            $em->remove($athlete);
            $em->flush();
            $this->addFlash('success', 'Athlète supprimé avec succès !');
        }

        return $this->redirectToRoute('admin_athlete_index');
    }
}
