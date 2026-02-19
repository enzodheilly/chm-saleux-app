<?php

namespace App\Controller\Admin;

use App\Entity\MembershipPlan;
use App\Form\MembershipPlanType;
use App\Repository\MembershipPlanRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/membership-plans')]
class AdminMembershipPlanController extends AbstractController
{
    #[Route('/', name: 'admin_membership_plan_index', methods: ['GET'])]
    public function index(MembershipPlanRepository $membershipPlanRepository): Response
    {
        return $this->render('admin/membership_plan/index.html.twig', [
            'plans' => $membershipPlanRepository->findBy([], ['price' => 'ASC']),
        ]);
    }

    #[Route('/new', name: 'admin_membership_plan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $plan = new MembershipPlan();
        $form = $this->createForm(MembershipPlanType::class, $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($plan);
            $em->flush();

            $this->addFlash('success', '✅ Plan créé avec succès.');
            return $this->redirectToRoute('admin_membership_plan_index');
        }

        return $this->render('admin/membership_plan/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_membership_plan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MembershipPlan $plan, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(MembershipPlanType::class, $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', '📝 Plan mis à jour avec succès.');
            return $this->redirectToRoute('admin_membership_plan_index');
        }

        return $this->render('admin/membership_plan/edit.html.twig', [
            'form' => $form->createView(),
            'plan' => $plan,
        ]);
    }

    #[Route('/{id}', name: 'admin_membership_plan_delete', methods: ['POST'])]
    public function delete(Request $request, MembershipPlan $plan, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $plan->getId(), $request->request->get('_token'))) {
            $em->remove($plan);
            $em->flush();
            $this->addFlash('success', '🗑️ Plan supprimé avec succès.');
        }

        return $this->redirectToRoute('admin_membership_plan_index');
    }
}
