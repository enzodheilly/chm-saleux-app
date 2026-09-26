<?php

namespace App\Controller\Admin;

use App\Entity\DemandeLicence;
use App\Entity\Licence;
use App\Repository\DemandeLicenceRepository;
use App\Repository\LicenceRepository;
use App\Repository\UserRepository;
use App\Service\LicenceTarifService;
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
    public function index(DemandeLicenceRepository $repo, LicenceRepository $licenceRepository, LicenceTarifService $tarifService): Response
    {
        return $this->render('admin/demande_licence/index.html.twig', [
            'demandes'        => $repo->findAllOrderedByDate(),
            'licencesActives' => $licenceRepository->findByTypes(array_values($tarifService->getFormules())),
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
    public function updateStatutFfhm(
        DemandeLicence $demande,
        Request $request,
        EntityManagerInterface $em,
        SystemLoggerService $logger,
        LicenceTarifService $tarifService,
        UserRepository $userRepository,
    ): Response {
        if (!$this->isCsrfTokenValid('demande_ffhm_' . $demande->getId(), (string) $request->request->get('_token'))) {
            $this->addFlash('danger', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_demande_licence_show', ['id' => $demande->getId()]);
        }

        $demande->setStatutFfhm(DemandeLicence::STATUT_FFHM_TRANSFEREE);

        // Phase 3 : création automatique de la licence interne (QR code / check-in).
        // On ne recrée jamais deux fois la même licence si l'admin clique plusieurs fois.
        if ($demande->getLicenceCreeeId() === null) {
            $licence = $this->creerLicenceDepuisDemande($demande, $tarifService, $userRepository);
            $em->persist($licence);
            $em->flush(); // nécessaire pour obtenir l'id généré de $licence

            $demande->setLicenceCreeeId($licence->getId());

            $logger->add(SystemLoggerService::TYPE_ADMIN, sprintf(
                'Licence #%d (n°%s) créée automatiquement pour la demande #%d (%s %s)',
                $licence->getId(),
                $licence->getNumber(),
                $demande->getId(),
                $demande->getPrenom(),
                $demande->getNom()
            ));
        }

        $em->flush();

        $logger->add(SystemLoggerService::TYPE_ADMIN, sprintf(
            'Demande de licence #%d (%s %s) : marquée transférée à la FFHM',
            $demande->getId(),
            $demande->getPrenom(),
            $demande->getNom()
        ));

        $this->addFlash('success', 'Demande marquée comme transférée à la FFHM. Licence interne créée automatiquement.');
        return $this->redirectToRoute('admin_demande_licence_show', ['id' => $demande->getId()]);
    }

    /**
     * Construit la licence interne (table générale Licence, avec QR code) à
     * partir d'une demande validée. Le numéro est une référence interne — à
     * remplacer manuellement par le vrai numéro FFHM depuis /gestion-chm-secrete-92x/licences
     * dès que le club le reçoit de la fédération.
     */
    private function creerLicenceDepuisDemande(DemandeLicence $demande, LicenceTarifService $tarifService, UserRepository $userRepository): Licence
    {
        $formuleLabel = $tarifService->getFormules()[$demande->getFormule()] ?? $demande->getFormule();

        $benefits = [];
        if ($demande->isGratuiteAppliquee()) {
            $benefits[] = 'Gratuité Benjamin (parent déjà licencié)';
        }
        if ($demande->isTarifReduit()) {
            $benefits[] = 'Tarif réduit';
        }
        if ($demande->getFoyerRang() > 1) {
            $taux = match (min(4, $demande->getFoyerRang())) {
                2 => '-10%',
                3 => '-15%',
                default => '-20%',
            };
            $benefits[] = sprintf('Réduction familiale (%s licence du foyer, %s)', $demande->getFoyerRang() . 'ème', $taux);
        }
        if ($demande->isRenouvellement()) {
            $benefits[] = 'Renouvellement';
        }

        $licence = new Licence();
        $licence->setType($formuleLabel);
        $licence->setNumber(sprintf('LIC-%s-%06d', (new \DateTimeImmutable())->format('Y'), $demande->getId()));
        $licence->setExpiryDate($tarifService->getFinDeSaison(new \DateTimeImmutable()));
        $licence->setFirstName($demande->getPrenom());
        $licence->setLastName($demande->getNom());
        $licence->setEmail($demande->getEmail());
        $licence->setBenefits($benefits);
        $licence->setUser($userRepository->findOneBy(['email' => $demande->getEmail()]));

        return $licence;
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
