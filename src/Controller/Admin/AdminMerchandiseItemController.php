<?php
// src/Controller/Admin/AdminMerchandiseItemController.php

namespace App\Controller\Admin;

use App\Entity\MerchandiseItem;
use App\Form\MerchandiseItemType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion-chm-secrete-92x/merchandise')]
class AdminMerchandiseItemController extends AbstractController
{
    #[Route('/', name: 'admin_merchandise_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $items = $em->getRepository(MerchandiseItem::class)->findAll();

        return $this->render('admin/merchandise/index.html.twig', [
            'items' => $items,
        ]);
    }

    #[Route('/new', name: 'admin_merchandise_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $item = new MerchandiseItem();
        $form = $this->createForm(MerchandiseItemType::class, $item);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $newFilename = uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Error while uploading the image.');
                    return $this->redirectToRoute('admin_merchandise_new');
                }

                $item->setImage($newFilename);
            }

            $em->persist($item);
            $em->flush();

            $this->addFlash('success', 'Merchandise item created successfully!');
            return $this->redirectToRoute('admin_merchandise_index');
        }

        return $this->render('admin/merchandise/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_merchandise_edit')]
    public function edit(Request $request, EntityManagerInterface $em, MerchandiseItem $item): Response
    {
        $form = $this->createForm(MerchandiseItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $newFilename = uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Error while uploading the image.');
                    return $this->redirectToRoute('admin_merchandise_edit', ['id' => $item->getId()]);
                }

                $oldImage = $item->getImage();
                if ($oldImage) {
                    $oldPath = $this->getParameter('images_directory') . '/' . $oldImage;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $item->setImage($newFilename);
            }

            $em->flush();

            $this->addFlash('success', 'Merchandise item updated successfully!');
            return $this->redirectToRoute('admin_merchandise_index');
        }

        return $this->render('admin/merchandise/edit.html.twig', [
            'form' => $form->createView(),
            'item' => $item,
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_merchandise_delete', methods: ['POST'])]
    public function delete(Request $request, EntityManagerInterface $em, MerchandiseItem $item): Response
    {
        if ($this->isCsrfTokenValid('delete' . $item->getId(), $request->request->get('_token'))) {
            $em->remove($item);
            $em->flush();
            $this->addFlash('success', 'Merchandise item deleted successfully!');
        }

        return $this->redirectToRoute('admin_merchandise_index');
    }
}
