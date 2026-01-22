<?php

namespace App\Controller\Admin;

use App\Entity\ClubInfo;
use App\Form\ClubInfoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/club-info')]
class AdminClubInfoController extends AbstractController
{
    #[Route('/', name: 'admin_clubinfo_index')]
    public function index(EntityManagerInterface $em): Response
    {
        return $this->render('admin/club_info/index.html.twig', [
            'infos' => $em->getRepository(ClubInfo::class)->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_clubinfo_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $info = new ClubInfo();

        $form = $this->createForm(ClubInfoType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($info);
            $em->flush();

            $this->addFlash('success', '✅ Nouvelle information ajoutée !');
            return $this->redirectToRoute('admin_clubinfo_index');
        }

        return $this->render('admin/club_info/form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Ajouter une information',
        ]);
    }

    #[Route('/edit/{id}', name: 'admin_clubinfo_edit')]
    public function edit(
        ClubInfo $info,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->createForm(ClubInfoType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', '✅ Information mise à jour !');
            return $this->redirectToRoute('admin_clubinfo_index');
        }

        return $this->render('admin/club_info/form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Modifier une information',
        ]);
    }

    #[Route('/delete/{id}', name: 'admin_clubinfo_delete', methods: ['POST'])]
    public function delete(
        ClubInfo $info,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $info->getId(), $request->request->get('_token'))) {
            $em->remove($info);
            $em->flush();
            $this->addFlash('success', '🗑️ Information supprimée.');
        }

        return $this->redirectToRoute('admin_clubinfo_index');
    }
}
