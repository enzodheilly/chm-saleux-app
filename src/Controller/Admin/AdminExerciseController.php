<?php
// src/Controller/Admin/AdminExerciseController.php

namespace App\Controller\Admin;

use App\Entity\Exercise;
use App\Form\ExerciseType;
use App\Repository\ExerciseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/exercise', name: 'admin_exercise_')]
class AdminExerciseController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function index(
        ExerciseRepository $exerciseRepository,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $exercises = $exerciseRepository->findBy([], ['name' => 'ASC']);

        // ✅ Add directly on index
        $exercise = new Exercise();
        $form = $this->createForm(ExerciseType::class, $exercise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($exercise);
            $em->flush();

            $this->addFlash('success', 'Exercice ajouté avec succès.');
            return $this->redirectToRoute('admin_exercise_index');
        }

        return $this->render('admin/exercise/index.html.twig', [
            'exercises' => $exercises,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $exercise = new Exercise();
        $form = $this->createForm(ExerciseType::class, $exercise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($exercise);
            $em->flush();

            $this->addFlash('success', 'Exercice ajouté avec succès.');
            return $this->redirectToRoute('admin_exercise_index');
        }

        return $this->render('admin/exercise/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(
        Exercise $exercise,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->createForm(ExerciseType::class, $exercise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Exercice modifié avec succès.');
            return $this->redirectToRoute('admin_exercise_index');
        }

        return $this->render('admin/exercise/edit.html.twig', [
            'exercise' => $exercise,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(
        Exercise $exercise,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        if ($this->isCsrfTokenValid('delete_exercise_' . $exercise->getId(), (string) $request->request->get('_token'))) {
            $em->remove($exercise);
            $em->flush();
            $this->addFlash('success', 'Exercice supprimé.');
        } else {
            $this->addFlash('danger', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('admin_exercise_index');
    }
}
