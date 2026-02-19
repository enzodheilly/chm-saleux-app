<?php
// src/Controller/Admin/AdminRoutineTemplateController.php

namespace App\Controller\Admin;

use App\Entity\RoutineTemplate;
use App\Entity\RoutineTemplateExercise;
use App\Form\RoutineTemplateType;
use App\Form\RoutineTemplateExerciseType;
use App\Repository\RoutineTemplateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/mobile/routines/templates', name: 'admin_routine_template_')]
class AdminRoutineTemplateController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, RoutineTemplateRepository $repo): Response
    {
        $goal = $request->query->get('goal');
        $level = $request->query->get('level');
        $muscleGroup = $request->query->get('muscleGroup');

        $criteria = [];
        if ($goal) $criteria['goal'] = $goal;
        if ($level) $criteria['level'] = $level;
        if ($muscleGroup) $criteria['muscleGroup'] = $muscleGroup;

        $templates = $repo->findBy($criteria, ['id' => 'DESC']);

        return $this->render('admin/routine_template/index.html.twig', [
            'templates' => $templates,
            'goal' => $goal,
            'level' => $level,
            'muscleGroup' => $muscleGroup,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $template = new RoutineTemplate();
        $form = $this->createForm(RoutineTemplateType::class, $template);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($template);
            $em->flush();

            $this->addFlash('success', 'Template créé avec succès.');
            return $this->redirectToRoute('admin_routine_template_edit', ['id' => $template->getId()]);
        }

        return $this->render('admin/routine_template/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(RoutineTemplate $template, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(RoutineTemplateType::class, $template);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Template mis à jour.');
            return $this->redirectToRoute('admin_routine_template_edit', ['id' => $template->getId()]);
        }

        return $this->render('admin/routine_template/edit.html.twig', [
            'template' => $template,
            'form' => $form->createView(),
            'items' => $template->getTemplateExercises(),
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function delete(RoutineTemplate $template, Request $request, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete_template_' . $template->getId(), (string) $request->request->get('_token'))) {
            $em->remove($template);
            $em->flush();
            $this->addFlash('success', 'Template supprimé.');
        } else {
            $this->addFlash('danger', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('admin_routine_template_index');
    }

    #[Route('/{id}/exercise/new', name: 'exercise_new', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function addExercise(RoutineTemplate $template, Request $request, EntityManagerInterface $em): Response
    {
        $item = new RoutineTemplateExercise();
        $item->setRoutineTemplate($template);

        $lastPos = 0;
        foreach ($template->getTemplateExercises() as $existing) {
            $lastPos = max($lastPos, $existing->getPosition());
        }
        $item->setPosition($lastPos + 1);

        $form = $this->createForm(RoutineTemplateExerciseType::class, $item);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($template->getTemplateExercises() as $existing) {
                if ($existing->getExercise()?->getId() === $item->getExercise()?->getId()) {
                    $this->addFlash('danger', 'Cet exercice est déjà présent dans ce template.');
                    return $this->redirectToRoute('admin_routine_template_edit', ['id' => $template->getId()]);
                }
            }

            $em->persist($item);
            $em->flush();

            $this->addFlash('success', 'Exercice ajouté au template.');
            return $this->redirectToRoute('admin_routine_template_edit', ['id' => $template->getId()]);
        }

        return $this->render('admin/routine_template/exercise_new.html.twig', [
            'template' => $template,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/exercise/{id}/delete', name: 'exercise_delete', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function deleteTemplateExercise(RoutineTemplateExercise $item, Request $request, EntityManagerInterface $em): Response
    {
        $templateId = $item->getRoutineTemplate()?->getId();

        if ($this->isCsrfTokenValid('delete_tpl_item_' . $item->getId(), (string) $request->request->get('_token'))) {
            $em->remove($item);
            $em->flush();
            $this->addFlash('success', 'Exercice retiré du template.');
        } else {
            $this->addFlash('danger', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('admin_routine_template_edit', ['id' => $templateId]);
    }
}
