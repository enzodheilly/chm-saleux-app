<?php

namespace App\Controller\Front;

use App\Entity\DemandeLicence;
use App\Repository\DemandeLicenceRepository;
use App\Repository\LicenceRepository;
use App\Service\HelloAssoService;
use App\Service\LicenceTarifService;
use App\Service\SystemLoggerService;
use App\Service\TurnstileVerifierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
        HelloAssoService $helloAsso,
        LicenceRepository $licenceRepository,
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

        // Détection nouveau/renouvellement : email déjà présent dans la table des licences ?
        $ancienneLicence = $licenceRepository->findOneByEmail($email);
        if ($ancienneLicence !== null) {
            $demande->setTypeDemande(DemandeLicence::TYPE_DEMANDE_RENOUVELLEMENT);
            $ancienneDate = $licenceRepository->findOldestExpiryDateByEmail($email);
            if ($ancienneDate !== null) {
                $demande->setDerniereLicenceConnueLe(\DateTimeImmutable::createFromInterface($ancienneDate));
            }
        }

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
        $modePaiement = trim((string) $request->request->get('mode_paiement', DemandeLicence::MODE_PAIEMENT_EN_LIGNE));
        if (!in_array($modePaiement, DemandeLicence::MODES_PAIEMENT, true)) {
            $modePaiement = DemandeLicence::MODE_PAIEMENT_EN_LIGNE;
        }
        $demande->setModePaiement($modePaiement);
        $demande->setStatutPaiement(
            $modePaiement === DemandeLicence::MODE_PAIEMENT_AU_CLUB
                ? DemandeLicence::STATUT_PAIEMENT_A_ENCAISSER
                : DemandeLicence::STATUT_PAIEMENT_EN_ATTENTE
        );

        // ── Gratuité "Benjamin" : automatique si un parent (même nom de famille) est
        // déjà licencié au club pour la saison en cours — voir page "avantages". ──
        $finDeSaison = $tarifService->getFinDeSaison(new \DateTimeImmutable());
        $gratuit = $formule === LicenceTarifService::FORMULE_COMPETITION
            && $tarifService->isCategorieBenjamin($demande->getDateNaissance())
            && $licenceRepository->existeDejaLicenceMemeFamilleSaison($nom, $email, $finDeSaison);
        $demande->setGratuiteAppliquee($gratuit);

        // ── Calcul du montant ──
        $montant = $tarifService->calculerMontant($formule, new \DateTimeImmutable(), $tarifReduit, $demande->getFoyerRang(), $demande->getDateNaissance(), $gratuit);
        $demande->setMontantCalcule($montant);

        if ($gratuit) {
            // Rien à payer : licence gratuite, pas de paiement en ligne à initier.
            $modePaiement = DemandeLicence::MODE_PAIEMENT_AU_CLUB;
            $demande->setModePaiement($modePaiement);
            $demande->setStatutPaiement(DemandeLicence::STATUT_PAIEMENT_PAYEE);
        }

        // ── HelloAsso : génération du token anti-énumération ──
        if ($modePaiement === DemandeLicence::MODE_PAIEMENT_EN_LIGNE) {
            $demande->setPaiementToken(bin2hex(random_bytes(24)));
        }

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

        // ── Redirection HelloAsso si paiement en ligne ──
        if ($modePaiement === DemandeLicence::MODE_PAIEMENT_EN_LIGNE && $helloAsso->isConfigured()) {
            try {
                $returnUrl = $this->generateUrl('demande_licence_retour', [
                    'id'    => $demande->getId(),
                    'token' => $demande->getPaiementToken(),
                ], UrlGeneratorInterface::ABSOLUTE_URL);
                $errorUrl  = $this->generateUrl('demande_licence_retour', [
                    'id'    => $demande->getId(),
                    'token' => $demande->getPaiementToken(),
                ], UrlGeneratorInterface::ABSOLUTE_URL);
                $backUrl   = $this->generateUrl('demande_licence', [], UrlGeneratorInterface::ABSOLUTE_URL);

                $formuleLabel = $tarifService->getFormules()[$formule] ?? $formule;
                $result = $helloAsso->createCheckoutIntent(
                    (int) round($montant * 100),
                    'Licence ' . $formuleLabel . ' — CHM Saleux',
                    ['firstName' => $prenom, 'lastName' => $nom, 'email' => $email],
                    $backUrl,
                    $errorUrl,
                    $returnUrl,
                    ['demande_licence_id' => (string) $demande->getId()]
                );

                $demande->setHelloAssoCheckoutIntentId($result['id']);
                $em->flush();

                $this->sendAckEmail($mailer, $email, $prenom, $tarifService->getFormules()[$formule] ?? $formule, $montant, $modePaiement);

                return new RedirectResponse($result['redirectUrl']);
            } catch (\Throwable $e) {
                $logger->add('HelloAsso', 'Échec createCheckoutIntent pour demande #' . $demande->getId() . ' : ' . $e->getMessage());
                // Fallback silencieux : on bascule en paiement au club
                $demande->setModePaiement(DemandeLicence::MODE_PAIEMENT_AU_CLUB);
                $demande->setStatutPaiement(DemandeLicence::STATUT_PAIEMENT_A_ENCAISSER);
                $demande->setPaiementToken(null);
                $em->flush();
                $this->addFlash('warning', 'Le paiement en ligne est temporairement indisponible. Votre demande a bien été enregistrée — le bureau vous contactera pour le règlement.');
                $modePaiement = DemandeLicence::MODE_PAIEMENT_AU_CLUB;
            }
        }

        $this->sendAckEmail($mailer, $email, $prenom, $tarifService->getFormules()[$formule] ?? $formule, $montant, $modePaiement);

        return $this->render('licence/demande_merci.html.twig', [
            'demande'          => $demande,
            'formuleLabel'     => $tarifService->getFormules()[$formule] ?? $formule,
            'paiementConfirme' => false,
        ]);
    }

    #[Route('/inscription-licence/retour/{id}', name: 'demande_licence_retour', methods: ['GET'])]
    public function retourPaiement(
        int $id,
        Request $request,
        DemandeLicenceRepository $repository,
        EntityManagerInterface $em,
        HelloAssoService $helloAsso,
        LicenceTarifService $tarifService,
        MailerInterface $mailer,
        SystemLoggerService $logger,
    ): Response {
        $token   = (string) $request->query->get('token', '');
        $demande = $repository->find($id);

        if (!$demande instanceof DemandeLicence
            || $demande->getPaiementToken() === null
            || !hash_equals($demande->getPaiementToken(), $token)
        ) {
            throw $this->createNotFoundException();
        }

        $formuleLabel = $tarifService->getFormules()[$demande->getFormule()] ?? $demande->getFormule();

        // Déjà traité (webhook arrivé avant le retour)
        if ($demande->getStatutPaiement() === DemandeLicence::STATUT_PAIEMENT_PAYEE) {
            return $this->render('licence/demande_merci.html.twig', [
                'demande'          => $demande,
                'formuleLabel'     => $formuleLabel,
                'paiementConfirme' => true,
            ]);
        }

        if ($demande->getHelloAssoCheckoutIntentId() === null) {
            return $this->render('licence/demande_paiement_attente.html.twig', [
                'formuleLabel' => $formuleLabel,
            ]);
        }

        try {
            $intent = $helloAsso->getCheckoutIntent($demande->getHelloAssoCheckoutIntentId());
        } catch (\Throwable $e) {
            $logger->add('HelloAsso', 'Retour paiement : échec vérification API pour demande #' . $demande->getId() . ' : ' . $e->getMessage());
            return $this->render('licence/demande_paiement_attente.html.twig', [
                'formuleLabel' => $formuleLabel,
            ]);
        }

        if ($helloAsso->isCheckoutIntentPaid($intent)) {
            $demande->setStatutPaiement(DemandeLicence::STATUT_PAIEMENT_PAYEE);
            $demande->setDatePaiement(new \DateTimeImmutable());
            $em->flush();

            $logger->add('HelloAsso', 'Paiement confirmé via retour URL pour la demande #' . $demande->getId());

            $this->sendPaiementConfirmeEmail($mailer, $demande, $formuleLabel);

            return $this->render('licence/demande_merci.html.twig', [
                'demande'          => $demande,
                'formuleLabel'     => $formuleLabel,
                'paiementConfirme' => true,
            ]);
        }

        if ($helloAsso->isCheckoutIntentRefused($intent)) {
            return $this->render('licence/demande_paiement_echec.html.twig', [
                'formuleLabel' => $formuleLabel,
            ]);
        }

        return $this->render('licence/demande_paiement_attente.html.twig', [
            'formuleLabel' => $formuleLabel,
        ]);
    }

    private function sendAckEmail(MailerInterface $mailer, string $to, string $prenom, string $formuleLabel, float|string $montant, string $modePaiement): void
    {
        try {
            $ack = (new Email())
                ->from('support@chm-saleux.fr')
                ->to($to)
                ->subject('Votre demande de licence a bien été reçue — CHM Saleux')
                ->html($this->renderView('emails/demande_licence_received.html.twig', [
                    'prenom'       => $prenom,
                    'formule'      => $formuleLabel,
                    'montant'      => $montant,
                    'modePaiement' => $modePaiement,
                ]));
            $ack->getHeaders()->addTextHeader('X-Transport', 'support');
            $mailer->send($ack);
        } catch (\Throwable) {
            // non-bloquant
        }
    }

    private function sendPaiementConfirmeEmail(MailerInterface $mailer, DemandeLicence $demande, string $formuleLabel): void
    {
        try {
            $email = (new Email())
                ->from('support@chm-saleux.fr')
                ->to($demande->getEmail())
                ->subject('Paiement confirmé — Votre licence CHM Saleux')
                ->html($this->renderView('emails/demande_licence_paiement_confirme.html.twig', [
                    'demande'      => $demande,
                    'formuleLabel' => $formuleLabel,
                ]));
            $email->getHeaders()->addTextHeader('X-Transport', 'support');
            $mailer->send($email);
        } catch (\Throwable) {
            // non-bloquant
        }
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
