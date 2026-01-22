<?php

namespace App\Controller\Admin;

use App\Entity\Machine;
use App\Form\MachineType;
use App\Repository\MachineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/machines')]
class AdminMachineController extends AbstractController
{
    #[Route('/', name: 'admin_machine_list')]
    public function index(MachineRepository $repo): Response
    {
        return $this->render('admin/machine/index.html.twig', [
            'machines' => $repo->findBy([], ['id' => 'DESC'])
        ]);
    }

    #[Route('/new', name: 'admin_machine_new')]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response {
        $machine = new Machine();
        $form = $this->createForm(MachineType::class, $machine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Gestion upload image
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $safeName = $slugger->slug($machine->getName());
                $filename = $safeName . '-' . uniqid() . '.' . $imageFile->guessExtension();

                $imageFile->move(
                    $this->getParameter('machines_directory'),
                    $filename
                );

                $machine->setImage($filename);
            }

            $em->persist($machine);
            $em->flush();

            return $this->redirectToRoute('admin_machine_list');
        }

        return $this->render('admin/machine/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/edit/{id}', name: 'admin_machine_edit')]
    public function edit(
        Machine $machine,
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response {
        $form = $this->createForm(MachineType::class, $machine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $safeName = $slugger->slug($machine->getName());
                $filename = $safeName . '-' . uniqid() . '.' . $imageFile->guessExtension();
                $imageFile->move($this->getParameter('machines_directory'), $filename);

                // Supprimer l’ancienne image si elle existe
                $oldImage = $machine->getImage();
                if ($oldImage && file_exists($this->getParameter('machines_directory') . '/' . $oldImage)) {
                    unlink($this->getParameter('machines_directory') . '/' . $oldImage);
                }

                $machine->setImage($filename);
            }

            $em->persist($machine);
            $em->flush();

            return $this->redirectToRoute('admin_machine_list');
        }

        return $this->render('admin/machine/edit.html.twig', [
            'form' => $form->createView(),
            'machine' => $machine,
        ]);
    }

    #[Route('/delete/{id}', name: 'admin_machine_delete')]
    public function delete(
        Machine $machine,
        EntityManagerInterface $em
    ): Response {
        // Supprimer l'image du dossier
        $imagePath = $this->getParameter('machines_directory') . '/' . $machine->getImage();
        if (file_exists($imagePath)) unlink($imagePath);

        $em->remove($machine);
        $em->flush();

        return $this->redirectToRoute('admin_machine_list');
    }
}
