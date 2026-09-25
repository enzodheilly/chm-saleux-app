<?php

namespace App\Controller\Front;

use App\Entity\DemandeLicence;
use App\Service\LicenceTarifService;
use App\Service\SystemLoggerService;
use App\Service\TurnstileVerifierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class DemandeLicenceController extends AbstractController
{
    public function __construct(
        private readonly string $licenceDocumentsDir,
    ) {}

    #[Route('/inscription-licence', name: 'demande_licence')]
    public function index(LicenceTarifService $tarifService): Response
    {
        return $this->render('licence/demande.html.twig', [
            'formules' => $tarifService->getFormules(),
        ]);
    }

    #[Route('/inscription-licence/envoyer', name: 'demande_licence_submit', methods: ['POST'])]
    public function submit(
        Request $request,
        EntityManagerInterface $em,
        LicenceTarifService $tarifService,
        TurnstileVerifierService $turnstile,
        SystemLoggerService $logger,
        MailerInterface $mailer,
    ): Response {
        if (!$this->isCsrfTokenValid('demande_licence_submit', (string) $request->request->get('_token', ''))) {
            $this->addFlash('danger', 'Jeton CSRF invalide. Merci de réessayer.');
            return $this->redirectToRoute('demande_licence');
        }

        $turnstileResponse = $request->request->get('cf-turnstile-response');
        if (!$turnstile->verify($turnstileResponse, $request->getClientIp())) {
            $this->addFlash('danger', 'La vérification anti-robot a échoué. Merci de réessayer.');
            return $this->redirectToRoute('demande_licence');
        }

        // ── Champs obligatoires ──
        $nom     = trim((string) $request->request->get('nom', ''));
        $prenom  = trim((string) $request->request->get('prenom', ''));
        $email   = trim((string) $request->request->get('email', ''));
        $formule = trim((string) $request->request->get('formule', ''));

        if ($nom === '' || $prenom === '' || $email === '') {
            $this->addFlash('danger', 'Le nom, le prénom et l\'email sont obligatoires.');
            return $this->redirectToRoute('demande_licence');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addFlash('danger', 'Adresse email invalide.');
            return $this->redirectToRoute('demande_licence');
        }
        if (!in_array($formule, DemandeLicence::FORMULES, true)) {
            $this->addFlash('danger', 'Formule invalide.');
            return $this->redirectToRoute('demande_licence');
        }

        if (!$request->request->getBoolean('consentement_rgpd')) {
            $this->addFlash('danger', 'Vous devez accepter la transmission de vos données à la FFHM pour poursuivre.');
            return $this->redirectToRoute('demande_licence');
        }

        /** @var UploadedFile|null $certificatMedical */
        $certificatMedical = $request->files->get('certificat_medical');
        if (!$certificatMedical instanceof UploadedFile) {
            $this->addFlash('danger', 'Le certificat médical (ou questionnaire de santé) est obligatoire.');
            return $this->redirectToRoute('demande_licence');
        }

        $certificatPath = $this->storeDocument($certificatMedical);
        if ($certificatPath === null) {
            $this->addFlash('danger', 'Le fichier du certificat médical est invalide (formats acceptés : PDF, JPG, PNG — 8 Mo max).');
            return $this->redirectToRoute('demande_licence');
        }

        $demande = new DemandeLicence();
        $demande->setFormule($formule);
        $demande->setNom($nom);
        $demande->setPrenom($prenom);
        $demande->setEmail($email);
        $demande->setCertificatMedicalPath($certificatPath);
        $demande->setConsentementRgpdAt(new \DateTimeImmutable());

        $sexe = trim((string) $request->request->get('sexe', ''));
        if (in_array($sexe, ['F', 'M'], true)) {
            $demande->setSexe($sexe);
        }

        $dateNaissanceRaw = trim((string) $request->request->get('date_naissance', ''));
        if ($dateNaissanceRaw !== '') {
            try {
                $demande->setDateNaissance(new \DateTimeImmutable($dateNaissanceRaw));
            } catch (\Exception) {
            }
        }

        $demande->setAdresse($this->nullIfEmpty($request->request->get('adresse', '')));
        $demande->setTelephone($this->nullIfEmpty($request->request->get('telephone', '')));
        $demande->setResponsableNom($this->nullIfEmpty($request->request->get('responsable_nom', '')));
        $demande->setResponsableLien($this->nullIfEmpty($request->request->get('responsable_lien', '')));
        $demande->setResponsableTelephone($this->nullIfEmpty($request->request->get('responsable_telephone', '')));
        $demande->setResponsableEmail($this->nullIfEmpty($request->request->get('responsable_email', '')));

        // ── Tarif réduit ──
        $tarifReduit = $request->request->getBoolean('tarif_reduit');
        $demande->setTarifReduit($tarifReduit);
        if ($tarifReduit) {
            /** @var UploadedFile|null $justificatif */
            $justificatif = $request->files->get('justificatif_reduit');
            if ($justificatif instanceof UploadedFile) {
                $justifPath = $this->storeDocument($justificatif);
                if ($justifPath !== null) {
                    $demande->setJustificatifReduitPath($justifPath);
                }
            }
        }

        // ── Réduction familiale ──
        $foyerRang = (int) $request->request->get('foyer_rang', 1);
        $demande->setFoyerRang(max(1, min(4, $foyerRang)));

        // ── Mode de paiement ──
        $modePaiement = trim((string) $request->request->get('mode_paiement', DemandeLicence::MODE_PAIEMENT_AU_CLUB));
        if (!in_array($modePaiement, DemandeLicence::MODES_PAIEMENT, true)) {
            $modePaiement = DemandeLicence::MODE_PAIEMENT_AU_CLUB;
        }
        $demande->setModePaiement($modePaiement);
        $demande->setStatutPaiement(
            $modePaiement === DemandeLicence::MODE_PAIEMENT_AU_CLUB
                ? DemandeLicence::STATUT_PAIEMENT_A_ENCAISSER
                : DemandeLicence::STATUT_PAIEMENT_EN_ATTENTE // paiement en ligne : module HelloAsso à venir
        );

        // ── Calcul du montant ──
        $montant = $tarifService->calculerMontant($formule, new \DateTimeImmutable(), $tarifReduit, $demande->getFoyerRang());
        $demande->setMontantCalcule($montant);

        $em->persist($demande);
        $em->flush();

        $logger->add('Demande de licence', sprintf(
            'Nouvelle demande de licence : %s %s (%s, %s€, paiement %s)',
            $prenom,
            $nom,
            $formule,
            number_format($montant, 2, ',', ' '),
            $modePaiement === DemandeLicence::MODE_PAIEMENT_AU_CLUB ? 'au club' : 'en ligne'
        ));

        try {
            $ack = (new Email())
                ->from('support@chm-saleux.fr')
                ->to($email)
                ->subject('Votre demande de licence a bien été reçue — CHM Saleux')
                ->html($this->renderView('emails/demande_licence_received.html.twig', [
                    'prenom'  => $prenom,
                    'formule' => $tarifService->getFormules()[$formule] ?? $formule,
                    'montant' => $montant,
                    'modePaiement' => $modePaiement,
                ]));
            $ack->getHeaders()->addTextHeader('X-Transport', 'support');
            $mailer->send($ack);
        } catch (\Throwable) {
            // non-bloquant
        }

        return $this->render('licence/demande_merci.html.twig', [
            'demande' => $demande,
            'formuleLabel' => $tarifService->getFormules()[$formule] ?? $formule,
        ]);
    }

    private function storeDocument(UploadedFile $file): ?string
    {
        $allowedExt = ['pdf', 'jpg', 'jpeg', 'png'];
        $ext = strtolower((string) $file->guessExtension());
        if (!in_array($ext, $allowedExt, true)) {
            return null;
        }
        if ($file->getSize() !== null && $file->getSize() > 8 * 1024 * 1024) {
            return null;
        }

        $newFilename = bin2hex(random_bytes(16)) . '.' . $ext;
        if (!is_dir($this->licenceDocumentsDir)) {
            @mkdir($this->licenceDocumentsDir, 0775, true);
        }
        try {
            $file->move($this->licenceDocumentsDir, $newFilename);
            return $newFilename;
        } catch (\Throwable) {
            return null;
        }
    }

    private function nullIfEmpty(mixed $value): ?string
    {
        $value = trim((string) $value);
        return $value === '' ? null : $value;
    }
}
