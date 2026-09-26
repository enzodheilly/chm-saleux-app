<?php

namespace App\Controller\Front;

use App\Entity\DemandeLicence;
use App\Repository\DemandeLicenceRepository;
use App\Service\HelloAssoService;
use App\Service\LicenceTarifService;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Réception des notifications webhook HelloAsso (paiement des licences).
 *
 * Notre compte n'étant pas "partenaire" HelloAsso, nous n'avons pas de
 * SignatureKey pour vérifier l'authenticité de la requête (voir
 * https://dev.helloasso.com/docs/secure-webhook). Par sécurité, on ne fait
 * donc JAMAIS confiance au contenu de la notification pour mettre à jour un
 * statut : elle sert uniquement de déclencheur pour aller relire l'état réel
 * du paiement directement auprès de l'API HelloAsso (source de vérité).
 */
class HelloAssoWebhookController extends AbstractController
{
    #[Route('/webhook/helloasso-licence', name: 'helloasso_webhook_licence', methods: ['POST'])]
    public function __invoke(
        Request $request,
        EntityManagerInterface $em,
        DemandeLicenceRepository $repository,
        HelloAssoService $helloAsso,
        MailerInterface $mailer,
        SystemLoggerService $logger,
        LicenceTarifService $tarifService,
    ): JsonResponse {
        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload)) {
            return new JsonResponse(['ok' => true]); // corps invalide : on acquitte quand même pour éviter les relances
        }

        $eventType = $payload['eventType'] ?? null;
        if ($eventType !== 'Payment') {
            // Order, Form, Organization... : rien à faire pour nous ici.
            return new JsonResponse(['ok' => true]);
        }

        $data = $payload['data'] ?? [];
        $metadata = $data['metadata'] ?? $payload['metadata'] ?? [];
        $demandeId = $metadata['demande_licence_id'] ?? null;

        if ($demandeId === null) {
            $logger->add('HelloAsso', 'Webhook Payment reçu sans metadata.demande_licence_id, ignoré.');
            return new JsonResponse(['ok' => true]);
        }

        $demande = $repository->find((int) $demandeId);
        if (!$demande instanceof DemandeLicence || $demande->getHelloAssoCheckoutIntentId() === null) {
            $logger->add('HelloAsso', 'Webhook Payment : demande #' . $demandeId . ' introuvable ou sans checkout intent.');
            return new JsonResponse(['ok' => true]);
        }

        if ($demande->getStatutPaiement() === DemandeLicence::STATUT_PAIEMENT_PAYEE) {
            return new JsonResponse(['ok' => true]); // déjà traité (retour utilisateur ou webhook précédent)
        }

        // On ne se fie pas au contenu de la notification : on revérifie auprès de l'API.
        try {
            $intent = $helloAsso->getCheckoutIntent($demande->getHelloAssoCheckoutIntentId());
        } catch (\Throwable $e) {
            $logger->add('HelloAsso', 'Webhook : échec de la vérification API pour la demande #' . $demande->getId() . ' : ' . $e->getMessage());
            // On répond 200 quand même : HelloAsso retentera, et notre page de retour
            // (returnUrl) fera de toute façon la même vérification.
            return new JsonResponse(['ok' => true]);
        }

        if (!$helloAsso->isCheckoutIntentPaid($intent)) {
            return new JsonResponse(['ok' => true]);
        }

        $demande->setStatutPaiement(DemandeLicence::STATUT_PAIEMENT_PAYEE);
        $demande->setDatePaiement(new \DateTimeImmutable());
        $em->flush();

        $logger->add('HelloAsso', 'Paiement confirmé via webhook pour la demande #' . $demande->getId());

        try {
            $formuleLabel = $tarifService->getFormules()[$demande->getFormule()] ?? $demande->getFormule();
            $email = (new Email())
                ->from('support@chm-saleux.fr')
                ->to($demande->getEmail())
                ->subject('Paiement confirmé — Votre licence CHM Saleux')
                ->html($this->renderView('emails/demande_licence_paiement_confirme.html.twig', [
                    'demande' => $demande,
                    'formuleLabel' => $formuleLabel,
                ]));
            $email->getHeaders()->addTextHeader('X-Transport', 'support');
            $mailer->send($email);
        } catch (\Throwable) {
            // non-bloquant
        }

        return new JsonResponse(['ok' => true]);
    }
}
