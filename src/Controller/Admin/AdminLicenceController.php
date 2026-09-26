<?php

namespace App\Controller\Admin;

use App\Entity\Licence;
use App\Form\LicenceType;
use App\Repository\LicenceRepository;
use App\Repository\MembershipPlanRepository;
use App\Service\LicenceTarifService;
use App\Service\QrCodeService;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion-chm-secrete-92x/licences')]
#[IsGranted('ROLE_STAFF')]
class AdminLicenceController extends AbstractController
{
    #[Route('/', name: 'admin_licence_index', methods: ['GET'])]
    public function index(Request $request, LicenceRepository $licenceRepository, QrCodeService $qrCodeService, LicenceTarifService $tarifService): Response
    {
        $formuleTypes   = array_values($tarifService->getFormules());
        $saisons        = $licenceRepository->findDistinctSaisonFinAnnees($formuleTypes);
        $saisonFinAnnee = $request->query->get('saison') ? (int) $request->query->get('saison') : null;
        $licences       = $licenceRepository->findByTypes($formuleTypes, null, $saisonFinAnnee);

        $qrCodeImages = [];
        foreach ($licences as $licence) {
            if ($licence->getQrCodeToken()) {
                $qrCodeImages[$licence->getId()] = $qrCodeService->buildQrImageDataUri($licence->getQrCodeToken());
            }
        }

        return $this->render('admin/licence/index.html.twig', [
            'licences'     => $licences,
            'qrCodeImages' => $qrCodeImages,
            'saisons'      => $saisons,
            'saisonActive' => $saisonFinAnnee,
        ]);
    }

    #[Route('/new', name: 'admin_licence_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, SystemLoggerService $logger): Response
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

            $owner = $licence->getUser()?->getEmail() ?? '#' . $licence->getId();
            $logger->add(SystemLoggerService::TYPE_ADMIN, 'Création licence : ' . $owner . ' — ' . $licence->getType());
            $this->addFlash('success', '✅ Licence créée avec succès.');
            return $this->redirectToRoute('admin_licence_index');
        }

        return $this->render('admin/licence/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_licence_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Licence $licence, EntityManagerInterface $em, QrCodeService $qrCodeService, SystemLoggerService $logger): Response
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

            $logger->add(SystemLoggerService::TYPE_ADMIN, 'Modification licence #' . $licence->getId() . ' — ' . ($licence->getUser()?->getEmail() ?? ''));
            $this->addFlash('success', '📝 Licence mise à jour avec succès.');
            return $this->redirectToRoute('admin_licence_index');
        }

        return $this->render('admin/licence/edit.html.twig', [
            'licence' => $licence,
            'form' => $form->createView(),
            'qrCodeImage' => $licence->getQrCodeToken() ? $qrCodeService->buildQrImageDataUri($licence->getQrCodeToken()) : null,
        ]);
    }

    #[Route('/{id}', name: 'admin_licence_delete', methods: ['POST'])]
    public function delete(Request $request, Licence $licence, EntityManagerInterface $em, SystemLoggerService $logger): Response
    {
        if (!$this->isCsrfTokenValid('delete' . $licence->getId(), $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_licence_index');
        }

        $info = '#' . $licence->getId() . ' — ' . ($licence->getUser()?->getEmail() ?? '');
        $em->remove($licence);
        $em->flush();
        $logger->add(SystemLoggerService::TYPE_ADMIN, 'Suppression licence ' . $info);
        $this->addFlash('success', '🗑️ Licence supprimée avec succès.');

        return $this->redirectToRoute('admin_licence_index');
    }

    #[Route('/{id}/qrcode/regenerate', name: 'admin_licence_qrcode_regenerate', methods: ['POST'])]
    public function regenerateQrCode(Licence $licence, Request $request, QrCodeService $qrCodeService, SystemLoggerService $logger): Response
    {
        if (!$this->isCsrfTokenValid('qrcode_regenerate_' . $licence->getId(), (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_licence_edit', ['id' => $licence->getId()]);
        }

        $qrCodeService->regenerateForLicence($licence);

        $logger->add(SystemLoggerService::TYPE_ADMIN, 'Régénération QR code licence #' . $licence->getId());
        $this->addFlash('success', '🔄 QR code régénéré avec succès. L\'ancien code ne fonctionne plus.');
        return $this->redirectToRoute('admin_licence_edit', ['id' => $licence->getId()]);
    }

    #[Route('/membership-plan/{id}/benefits', name: 'admin_licence_membership_plan_benefits', methods: ['GET'])]
    public function getMembershipPlanBenefits(int $id, MembershipPlanRepository $repo): JsonResponse
    {
        $membershipPlan = $repo->find($id);

        if (!$membershipPlan) {
            return new JsonResponse(['error' => 'Plan introuvable'], 404);
        }

        return new JsonResponse([
            'name'     => $membershipPlan->getName(),
            'benefits' => $membershipPlan->getBenefits(),
        ]);
    }
}
