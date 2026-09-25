<?php

namespace App\Controller\Admin;

use App\Entity\DemandeLicence;
use App\Repository\DemandeLicenceRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/gestion-chm-secrete-92x/demandes-licence', name: 'admin_demande_licence_')]
#[IsGranted('ROLE_STAFF')]
class AdminDemandeLicenceController extends AbstractController
{
    public function __construct(
        private readonly string $licenceDocumentsDir,
    ) {}

    #[Route('', name: 'index', methods: ['GET'])]
    public function index(DemandeLicenceRepository $repo): Response
    {
        return $this->render('admin/demande_licence/index.html.twig', [
            'demandes' => $repo->findAllOrderedByDate(),
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(DemandeLicence $demande): Response
    {
        return $this->render('admin/demande_licence/show.html.twig', [
            'demande' => $demande,
        ]);
    }

    /** Téléchargement sécurisé d'un document (certificat médical ou justificatif tarif réduit). */
    #[Route('/{id}/document/{field}', name: 'document', methods: ['GET'], requirements: ['field' => 'certificat|justificatif'])]
    public function document(DemandeLicence $demande, string $field): Response
    {
        $filename = $field === 'certificat'
            ? $demande->getCertificatMedicalPath()
            : $demande->getJustificatifReduitPath();

        if (!$filename) {
            throw $this->createNotFoundException('Document introuvable.');
        }

        $path = rtrim($this->licenceDocumentsDir, '/') . '/' . basename($filename);
        if (!is_file($path)) {
            throw $this->createNotFoundException('Document introuvable.');
        }

        $response = new BinaryFileResponse($path);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            sprintf('%s-%s-%s', $field, $demande->getPrenom(), $demande->getNom())
        );

        return $response;
    }

    #[Route('/{id}/statut-paiement', name: 'statut_paiement', methods: ['POST'])]
    public function updateStatutPaiement(DemandeLicence $demande, Request $request, EntityManagerInterface $em, SystemLoggerService $logger): Response
    {
        if (!$this->isCsrfTokenValid('demande_statut_' . $demande->getId(), (string) $request->request->get('_token'))) {
            $this->addFlash('danger', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_demande_licence_show', ['id' => $demande->getId()]);
        }

        $statut = (string) $request->request->get('statut_paiement');
        $allowed = [
            DemandeLicence::STATUT_PAIEMENT_EN_ATTENTE,
            DemandeLicence::STATUT_PAIEMENT_A_ENCAISSER,
            DemandeLicence::STATUT_PAIEMENT_PAYEE,
        ];
        if (!in_array($statut, $allowed, true)) {
            $this->addFlash('danger', 'Statut de paiement invalide.');
            return $this->redirectToRoute('admin_demande_licence_show', ['id' => $demande->getId()]);
        }

        $demande->setStatutPaiement($statut);
        $em->flush();

        $logger->add(SystemLoggerService::TYPE_ADMIN, sprintf(
            'Demande de licence #%d (%s %s) : statut paiement → %s',
            $demande->getId(),
            $demande->getPrenom(),
            $demande->getNom(),
            $statut
        ));

        $this->addFlash('success', 'Statut de paiement mis à jour.');
        return $this->redirectToRoute('admin_demande_licence_show', ['id' => $demande->getId()]);
    }

    #[Route('/{id}/statut-ffhm', name: 'statut_ffhm', methods: ['POST'])]
    public function updateStatutFfhm(DemandeLicence $demande, Request $request, EntityManagerInterface $em, SystemLoggerService $logger): Response
    {
        if (!$this->isCsrfTokenValid('demande_ffhm_' . $demande->getId(), (string) $request->request->get('_token'))) {
            $this->addFlash('danger', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_demande_licence_show', ['id' => $demande->getId()]);
        }

        $demande->setStatutFfhm(DemandeLicence::STATUT_FFHM_TRANSFEREE);
        $em->flush();

        $logger->add(SystemLoggerService::TYPE_ADMIN, sprintf(
            'Demande de licence #%d (%s %s) : marquée transférée à la FFHM',
            $demande->getId(),
            $demande->getPrenom(),
            $demande->getNom()
        ));

        $this->addFlash('success', 'Demande marquée comme transférée à la FFHM.');
        return $this->redirectToRoute('admin_demande_licence_show', ['id' => $demande->getId()]);
    }

    #[Route('/{id}/notes', name: 'notes', methods: ['POST'])]
    public function updateNotes(DemandeLicence $demande, Request $request, EntityManagerInterface $em): Response
    {
        if (!$this->isCsrfTokenValid('demande_notes_' . $demande->getId(), (string) $request->request->get('_token'))) {
            $this->addFlash('danger', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_demande_licence_show', ['id' => $demande->getId()]);
        }

        $notes = trim((string) $request->request->get('notes_admin', ''));
        $demande->setNotesAdmin($notes !== '' ? $notes : null);
        $em->flush();

        $this->addFlash('success', 'Notes mises à jour.');
        return $this->redirectToRoute('admin_demande_licence_show', ['id' => $demande->getId()]);
    }
}
