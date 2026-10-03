<?php

namespace App\Controller\Admin;

use App\Entity\Licence;
use App\Form\LicenceType;
use App\Repository\LicenceRepository;
use App\Repository\MembershipPlanRepository;
use App\Service\LicenceTarifService;
use App\Service\QrCodeService;
use App\Service\CsvExportService;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion-chm-secrete-92x/licences')]
#[IsGranted('ROLE_STAFF')]
class AdminLicenceController extends AbstractController
{
    #[Route('/', name: 'admin_licence_index', methods: ['GET'])]
    public function index(Request $request, LicenceRepository $licenceRepository, QrCodeService $qrCodeService, LicenceTarifService $tarifService): Response
    {
        $formuleTypes       = array_values($tarifService->getFormules());
        $currentSaisonAnnee = (int) $tarifService->getFinDeSaison(new \DateTimeImmutable())->format('Y');

        // Archives = saisons passées uniquement ; la saison en cours bascule
        // automatiquement en archive à la saison suivante, sans toucher au code.
        $saisons = array_values(array_filter(
            $licenceRepository->findDistinctSaisonFinAnnees($formuleTypes),
            fn(int $s) => $s !== $currentSaisonAnnee
        ));

        // Arriver directement sur la saison la plus récente plutôt que "Toutes".
        if (!$request->query->has('saison') && !empty($saisons)) {
            return $this->redirectToRoute('admin_licence_index', ['saison' => $saisons[0]]);
        }

        $saisonFinAnnee = $request->query->get('saison') ? (int) $request->query->get('saison') : null;

        // Onglet "Toutes" : exclut quand même la saison en cours (pas encore une archive).
        $licences = $licenceRepository->findByTypes($formuleTypes, null, $saisonFinAnnee, false, $saisonFinAnnee === null ? $currentSaisonAnnee : null);

        // Les licences historiques (import 2020-2026) ont un QR code généré
        // automatiquement à la création de l'entité, mais ce système n'existait
        // pas à l'époque sur les saisons passées : on ne l'affiche pas, il n'a
        // jamais servi (voir isQrSupprime — les archives n'affichent de toute
        // façon jamais la saison en cours).
        $qrCodeImages = [];
        foreach ($licences as $licence) {
            if (!$this->isQrSupprime($licence, $tarifService) && $licence->getQrCodeToken()) {
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

    #[Route('/export', name: 'admin_licence_export', methods: ['GET'])]
    public function export(Request $request, LicenceRepository $licenceRepository, LicenceTarifService $tarifService, CsvExportService $csvExport): StreamedResponse
    {
        $formuleTypes       = array_values($tarifService->getFormules());
        $currentSaisonAnnee = (int) $tarifService->getFinDeSaison(new \DateTimeImmutable())->format('Y');
        $saisonFinAnnee     = $request->query->get('saison') ? (int) $request->query->get('saison') : null;

        $licences = $licenceRepository->findByTypes($formuleTypes, null, $saisonFinAnnee, false, $saisonFinAnnee === null ? $currentSaisonAnnee : null);

        $header = ['Numéro', 'Prénom', 'Nom', 'Email', 'Formule', 'Saison', 'Statut', 'Date expiration'];
        $rows   = array_map(fn(Licence $l) => [
            $l->getNumber(),
            $l->getFirstName(),
            $l->getLastName(),
            $l->getEmail() ?? '',
            $l->getType(),
            $l->getSaisonLabel(),
            !$l->isActivee() ? 'En attente' : ($l->getExpiryDate() < new \DateTimeImmutable() ? 'Expirée' : 'Active'),
            $l->getExpiryDate()?->format('d/m/Y') ?? '',
        ], $licences);

        $filename = 'licences-archives' . ($saisonFinAnnee ? '-' . ($saisonFinAnnee - 1) . '-' . $saisonFinAnnee : '') . '.csv';

        return $csvExport->streamCsv($filename, $header, $rows);
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
    public function edit(Request $request, Licence $licence, EntityManagerInterface $em, QrCodeService $qrCodeService, SystemLoggerService $logger, LicenceTarifService $tarifService): Response
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

        $retourUrl = $this->safeRetourUrl($request->query->get('retour'));

        return $this->render('admin/licence/edit.html.twig', [
            'licence' => $licence,
            'form' => $form->createView(),
            'qrCodeImage' => (!$this->isQrSupprime($licence, $tarifService) && $licence->getQrCodeToken())
                ? $qrCodeService->buildQrImageDataUri($licence->getQrCodeToken())
                : null,
            'retourUrl' => $retourUrl,
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

    private function safeRetourUrl(?string $retour): ?string
    {
        if ($retour === null) {
            return null;
        }
        // Chemin relatif uniquement (commence par / mais pas // ni /\)
        return preg_match('#^/[^/\\\\].*#', $retour) ? $retour : null;
    }

    /**
     * Une licence historique (import Excel/papier) n'a de QR code supprimé de
     * l'affichage que si elle appartient à une saison déjà passée : elle n'a
     * jamais eu de QR d'accès utilisé à l'époque. Une licence historique de la
     * saison EN COURS (ex. membre payé au club avant la mise en place du
     * formulaire en ligne) est une licence active comme une autre : son QR est
     * valide et doit être affichable/régénérable normalement.
     */
    private function isQrSupprime(Licence $licence, LicenceTarifService $tarifService): bool
    {
        if (!$licence->isHistorique()) {
            return false;
        }

        $currentSaisonAnnee = (int) $tarifService->getFinDeSaison(new \DateTimeImmutable())->format('Y');
        $licenceSaisonAnnee = $licence->getExpiryDate() ? (int) $licence->getExpiryDate()->format('Y') : null;

        return $licenceSaisonAnnee !== $currentSaisonAnnee;
    }

    #[Route('/{id}/qrcode/regenerate', name: 'admin_licence_qrcode_regenerate', methods: ['POST'])]
    public function regenerateQrCode(Licence $licence, Request $request, QrCodeService $qrCodeService, SystemLoggerService $logger, LicenceTarifService $tarifService): Response
    {
        if (!$this->isCsrfTokenValid('qrcode_regenerate_' . $licence->getId(), (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_licence_edit', ['id' => $licence->getId()]);
        }

        if ($this->isQrSupprime($licence, $tarifService)) {
            $this->addFlash('error', 'Cette licence est une licence historique d\'une saison passée (importée depuis les archives) : elle n\'a pas de QR code d\'accès.');
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
