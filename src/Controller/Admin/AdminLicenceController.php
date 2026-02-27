<?php

namespace App\Controller\Admin;

use App\Entity\Licence;
use App\Form\LicenceType;
use App\Repository\LicenceRepository;
use App\Repository\MembershipPlanRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/licences')]
class AdminLicenceController extends AbstractController
{
    #[Route('/', name: 'admin_licence_index', methods: ['GET'])]
    public function index(LicenceRepository $licenceRepository): Response
    {
        return $this->render('admin/licence/index.html.twig', [
            'licences' => $licenceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_licence_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $licence = new Licence();
        $form = $this->createForm(LicenceType::class, $licence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membershipPlan = $licence->getMembershipPlan();

            if ($membershipPlan) {
                $licence->setType($membershipPlan->getName());
                $licence->setBenefits($membershipPlan->getBenefits());
            }

            $em->persist($licence);
            $em->flush();

            $this->addFlash('success', '✅ Licence créée avec succès.');
            return $this->redirectToRoute('admin_licence_index');
        }

        return $this->render('admin/licence/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_licence_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Licence $licence, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(LicenceType::class, $licence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membershipPlan = $licence->getMembershipPlan();

            if ($membershipPlan) {
                $licence->setType($membershipPlan->getName());
                $licence->setBenefits($membershipPlan->getBenefits());
            }

            $em->flush();

            $this->addFlash('success', '📝 Licence mise à jour avec succès.');
            return $this->redirectToRoute('admin_licence_index');
        }

        return $this->render('admin/licence/edit.html.twig', [
            'licence' => $licence,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'admin_licence_delete', methods: ['POST'])]
    public function delete(Request $request, Licence $licence, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $licence->getId(), $request->request->get('_token'))) {
            $em->remove($licence);
            $em->flush();
            $this->addFlash('success', '🗑️ Licence supprimée avec succès.');
        }

        return $this->redirectToRoute('admin_licence_index');
    }

    #[Route('/membership-plan/{id}/benefits', name: 'admin_licence_membership_plan_benefits', methods: ['GET'])]
    public function getMembershipPlanBenefits(int $id, MembershipPlanRepository $repo): JsonResponse
    {
        $membershipPlan = $repo->find($id);

        if (!$membershipPlan) {
            return new JsonResponse(['error' => 'Plan introuvable'], 404);
        }

        return new JsonResponse([
            'nom' => $membershipPlan->getNom(),
            'benefits' => $membershipPlan->getBenefits(),
        ]);
    }
}
