<?php
// src/Controller/Admin/AdminNewEquipmentController.php

namespace App\Controller\Admin;

use App\Entity\NewEquipment;
use App\Form\NewEquipmentType;
use App\Repository\NewEquipmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/gestion-chm-secrete-92x/new-equipment', name: 'admin_new_equipment_')]
#[IsGranted('ROLE_STAFF')]
class AdminNewEquipmentController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(NewEquipmentRepository $repo): Response
    {
        return $this->render('admin/new_equipment/index.html.twig', [
            'newEquipments' => $repo->findBy([], ['createdAt' => 'DESC']),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response {
        $equipment = new NewEquipment();
        $form = $this->createForm(NewEquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Image upload handling
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $allowedMimes = ['image/jpeg', 'image/png', 'image/webp'];
                if (!in_array($imageFile->getMimeType(), $allowedMimes, true)) {
                    $this->addFlash('error', 'Format non autorisé (JPEG, PNG ou WebP uniquement).');
                    return $this->redirectToRoute('admin_new_equipment_new');
                }
                if ($imageFile->getSize() > 5 * 1024 * 1024) {
                    $this->addFlash('error', 'Image trop volumineuse (max 5 Mo).');
                    return $this->redirectToRoute('admin_new_equipment_new');
                }

                $safeName = $slugger->slug($equipment->getName());
                $filename = $safeName . '-' . bin2hex(random_bytes(8)) . '.' . $imageFile->guessExtension();

                $imageFile->move(
                    $this->getParameter('machines_directory'),
                    $filename
                );

                $equipment->setImage($filename);
            }

            $em->persist($equipment);
            $em->flush();

            return $this->redirectToRoute('admin_new_equipment_index');
        }

        return $this->render('admin/new_equipment/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(
        NewEquipment $equipment,
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response {
        $form = $this->createForm(NewEquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $allowedMimes = ['image/jpeg', 'image/png', 'image/webp'];
                if (!in_array($imageFile->getMimeType(), $allowedMimes, true)) {
                    $this->addFlash('error', 'Format non autorisé (JPEG, PNG ou WebP uniquement).');
                    return $this->redirectToRoute('admin_new_equipment_edit', ['id' => $equipment->getId()]);
                }
                if ($imageFile->getSize() > 5 * 1024 * 1024) {
                    $this->addFlash('error', 'Image trop volumineuse (max 5 Mo).');
                    return $this->redirectToRoute('admin_new_equipment_edit', ['id' => $equipment->getId()]);
                }

                $safeName = $slugger->slug($equipment->getName());
                $filename = $safeName . '-' . bin2hex(random_bytes(8)) . '.' . $imageFile->guessExtension();

                $imageFile->move(
                    $this->getParameter('machines_directory'),
                    $filename
                );

                $oldImage = $equipment->getImage();
                if ($oldImage) {
                    $oldPath = $this->getParameter('machines_directory') . '/' . $oldImage;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $equipment->setImage($filename);
            }

            $em->persist($equipment);
            $em->flush();

            return $this->redirectToRoute('admin_new_equipment_index');
        }

        return $this->render('admin/new_equipment/edit.html.twig', [
            'form' => $form->createView(),
            'equipment' => $equipment,
        ]);
    }

    #[Route('/delete/{id}', name: 'delete', methods: ['POST'])]
    public function delete(
        Request $request,
        NewEquipment $equipment,
        EntityManagerInterface $em
    ): Response {
        // CSRF protection (recommended)
        if (!$this->isCsrfTokenValid('delete' . $equipment->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Invalid CSRF token.');
        }

        // Delete image file
        $image = $equipment->getImage();
        if ($image) {
            $imagePath = $this->getParameter('machines_directory') . '/' . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $em->remove($equipment);
        $em->flush();

        return $this->redirectToRoute('admin_new_equipment_index');
    }
}
