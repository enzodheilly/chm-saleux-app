<?php
// src/Controller/Admin/AdminEquipmentController.php

namespace App\Controller\Admin;

use App\Entity\Equipment;
use App\Form\EquipmentType;
use App\Repository\EquipmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion-chm-secrete-92x/equipment', name: 'admin_equipment_')]
class AdminEquipmentController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function index(
        EquipmentRepository $equipmentRepository,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $equipments = $equipmentRepository->findBy([], ['name' => 'ASC']);

        // Inline add form on index page
        $equipment = new Equipment();
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($equipment);
            $em->flush();

            $this->addFlash('success', 'Équipement ajouté avec succès.');
            return $this->redirectToRoute('admin_equipment_index');
        }

        return $this->render('admin/equipment/index.html.twig', [
            'equipments' => $equipments,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $equipment = new Equipment();
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($equipment);
            $em->flush();

            $this->addFlash('success', 'Équipement ajouté avec succès.');
            return $this->redirectToRoute('admin_equipment_index');
        }

        return $this->render('admin/equipment/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Equipment $equipment, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Équipement modifié avec succès.');
            return $this->redirectToRoute('admin_equipment_index');
        }

        return $this->render('admin/equipment/edit.html.twig', [
            'equipment' => $equipment,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Equipment $equipment, Request $request, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete_equipment_' . $equipment->getId(), (string) $request->request->get('_token'))) {
            $em->remove($equipment);
            $em->flush();

            $this->addFlash('success', 'Équipement supprimé.');
        } else {
            $this->addFlash('danger', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('admin_equipment_index');
    }
}
