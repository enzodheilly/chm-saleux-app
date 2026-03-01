<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Entity\Licence;
use App\Entity\LicenceRequest;
use App\Repository\LicenceRepository;
use App\Repository\LicenceRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class LicenceController extends AbstractController
{
    #[Route('/api/licences/recovery/request', name: 'api_licence_recovery_request', methods: ['POST'])]
    public function requestRecovery(
        Request $request,
        LicenceRepository $licenceRepository,
        LicenceRequestRepository $licenceRequestRepository,
        EntityManagerInterface $em,
        MailerInterface $mailer
    ): JsonResponse {
        $licenceRequestRepository->clearExpiredRequests();

        $data = json_decode($request->getContent(), true) ?? [];

        $firstName = trim((string) ($data['firstName'] ?? ''));
        $lastName = trim((string) ($data['lastName'] ?? ''));
        $email = trim((string) ($data['email'] ?? ''));

        if ($firstName === '' || $lastName === '' || $email === '') {
            return new JsonResponse([
                'error' => 'Veuillez renseigner le prénom, le nom et l’email.'
            ], 400);
        }

        $results = $licenceRepository->recoverByIdentity($firstName, $lastName, $email);

        if (count($results) === 0) {
            return new JsonResponse([
                'error' => 'Aucune licence trouvée avec ces informations.'
            ], 404);
        }

        $formattedLicences = $this->formatRecoveryLicences($results);

        $code = (string) random_int(100000, 999999);

        $licenceRequest = new LicenceRequest();
        $licenceRequest
            ->setUserEmail($email)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setVerificationCode($code)
            ->setRequesterIp($request->getClientIp())
            ->setMatchedLicences($formattedLicences);

        $em->persist($licenceRequest);
        $em->flush();

        $this->sendRecoveryCode($mailer, $email, $code);

        return new JsonResponse([
            'success' => true,
            'token' => $licenceRequest->getToken(),
            'message' => 'Un code de vérification a été envoyé par email.'
        ]);
    }

    #[Route('/api/licences/recovery/verify', name: 'api_licence_recovery_verify', methods: ['POST'])]
    public function verifyRecovery(
        Request $request,
        LicenceRequestRepository $licenceRequestRepository,
        EntityManagerInterface $em
    ): JsonResponse {
        $data = json_decode($request->getContent(), true) ?? [];

        $token = trim((string) ($data['token'] ?? ''));
        $code = trim((string) ($data['code'] ?? ''));

        if ($token === '' || $code === '') {
            return new JsonResponse([
                'error' => 'Token ou code manquant.'
            ], 400);
        }

        $licenceRequest = $licenceRequestRepository->findOneBy(['token' => $token]);

        if (!$licenceRequest) {
            return new JsonResponse([
                'error' => 'Demande introuvable.'
            ], 404);
        }

        if ($licenceRequest->isExpired()) {
            return new JsonResponse([
                'error' => 'Le code a expiré.'
            ], 400);
        }

        if ($licenceRequest->getStatus() === LicenceRequest::STATUS_CONFIRMED) {
            return new JsonResponse([
                'error' => 'Cette demande a déjà été validée.'
            ], 400);
        }

        if ($licenceRequest->getFailedAttempts() >= 5) {
            return new JsonResponse([
                'error' => 'Trop de tentatives. Veuillez recommencer.'
            ], 429);
        }

        if ($licenceRequest->getVerificationCode() !== $code) {
            $licenceRequest->incrementFailedAttempts();
            $em->flush();

            return new JsonResponse([
                'error' => 'Code invalide.'
            ], 400);
        }

        $licenceRequest
            ->setStatus(LicenceRequest::STATUS_CONFIRMED)
            ->setConfirmedAt(new \DateTimeImmutable())
            ->setVerificationCode(null);

        $em->flush();

        return new JsonResponse([
            'success' => true,
            'licenses' => $licenceRequest->getMatchedLicences() ?? [],
        ]);
    }

    #[Route('/api/licences/recovery/associate', name: 'api_licence_recovery_associate', methods: ['POST'])]
    public function associateRecoveredLicence(
        Request $request,
        LicenceRequestRepository $licenceRequestRepository,
        LicenceRepository $licenceRepository,
        EntityManagerInterface $em
    ): JsonResponse {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return new JsonResponse([
                'error' => 'Utilisateur non authentifié.'
            ], 401);
        }

        $data = json_decode($request->getContent(), true) ?? [];

        $token = trim((string) ($data['token'] ?? ''));
        $licenseNumber = trim((string) ($data['licenseNumber'] ?? ''));

        if ($token === '' || $licenseNumber === '') {
            return new JsonResponse([
                'error' => 'Token ou numéro de licence manquant.'
            ], 400);
        }

        $licenceRequest = $licenceRequestRepository->findOneBy(['token' => $token]);

        if (!$licenceRequest) {
            return new JsonResponse([
                'error' => 'Demande introuvable.'
            ], 404);
        }

        if ($licenceRequest->isExpired()) {
            return new JsonResponse([
                'error' => 'La demande a expiré.'
            ], 400);
        }

        if ($licenceRequest->getStatus() !== LicenceRequest::STATUS_CONFIRMED) {
            return new JsonResponse([
                'error' => 'La vérification du code est requise avant l’association.'
            ], 400);
        }

        $matchedLicences = $licenceRequest->getMatchedLicences() ?? [];

        $allowedNumbers = array_map(
            static fn(array $item) => (string) ($item['licenseNumber'] ?? ''),
            $matchedLicences
        );

        if (!in_array($licenseNumber, $allowedNumbers, true)) {
            return new JsonResponse([
                'error' => 'Cette licence ne correspond pas à la demande validée.'
            ], 403);
        }

        $licence = $licenceRepository->findOneByNumber($licenseNumber);

        if (!$licence) {
            return new JsonResponse([
                'error' => 'Licence introuvable.'
            ], 404);
        }

        if ($licence->getUser() !== null) {
            if ($licence->getUser() === $user) {
                return new JsonResponse([
                    'success' => true,
                    'message' => 'Cette licence est déjà associée à votre compte.',
                    'license' => $this->normalizeLicence($licence),
                ]);
            }

            return new JsonResponse([
                'error' => 'Cette licence est déjà associée à un autre utilisateur.'
            ], 409);
        }

        // Limite à une seule licence par utilisateur
        if (!$user->getLicences()->isEmpty()) {
            return new JsonResponse([
                'error' => 'Votre compte possède déjà une licence associée.'
            ], 409);
        }

        $licence->setUser($user);
        $em->flush();

        return new JsonResponse([
            'success' => true,
            'message' => 'Licence associée avec succès.',
            'license' => $this->normalizeLicence($licence),
        ]);
    }

    #[Route('/api/licences/me', name: 'api_licence_me', methods: ['GET'])]
    public function myLicence(LicenceRepository $licenceRepository): JsonResponse
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return new JsonResponse([
                'error' => 'Utilisateur non authentifié.'
            ], 401);
        }

        $licence = $licenceRepository->createQueryBuilder('l')
            ->andWhere('l.user = :user')
            ->setParameter('user', $user)
            ->orderBy('l.expiryDate', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        return new JsonResponse([
            'success' => true,
            'license' => $licence ? $this->normalizeLicence($licence) : null,
        ]);
    }

    #[Route('/api/licences/{number}', name: 'api_licence_show', methods: ['GET'])]
    public function show(string $number, LicenceRepository $licenceRepository): JsonResponse
    {
        $licence = $licenceRepository->findOneByNumber($number);

        if (!$licence) {
            return new JsonResponse([
                'error' => 'Licence introuvable'
            ], 404);
        }

        return new JsonResponse($this->normalizeLicence($licence));
    }

    private function formatRecoveryLicences(array $licences): array
    {
        return array_map(function (Licence $licence) {
            return [
                'licenseNumber' => $licence->getNumber(),
                'firstName' => $licence->getFirstName(),
                'lastName' => $licence->getLastName(),
                'licenseType' => $licence->getType(),
                'expiryDate' => $licence->getExpiryDate()?->format('Y-m-d'),
            ];
        }, $licences);
    }

    private function sendRecoveryCode(
        MailerInterface $mailer,
        string $emailAddress,
        string $code
    ): void {
        $email = (new Email())
            ->from('no-reply@tonclub.fr')
            ->to($emailAddress)
            ->subject('Code de vérification - récupération de licence')
            ->text(
                "Bonjour,\n\n" .
                    "Votre code de vérification est : $code\n\n" .
                    "Ce code expire dans 15 minutes.\n\n" .
                    "Si vous n’êtes pas à l’origine de cette demande, ignorez cet email."
            );

        $mailer->send($email);
    }

    private function normalizeLicence(Licence $licence): array
    {
        return [
            'licenseNumber' => $licence->getNumber(),
            'firstName' => $licence->getFirstName(),
            'lastName' => $licence->getLastName(),
            'email' => $licence->getEmail(),
            'licenseType' => $licence->getType(),
            'paymentStatus' => $this->resolvePaymentStatus($licence),
            'paymentAmount' => $this->resolvePaymentAmount($licence),
            'expiryDate' => $licence->getExpiryDate()?->format('Y-m-d'),
            'memberStatus' => $this->resolveMemberStatus($licence),
            'advantages' => is_array($licence->getBenefits()) ? $licence->getBenefits() : [],
            'alreadyAssociated' => $licence->getUser() !== null,
            'membershipPlan' => $this->resolveMembershipPlanName($licence),
        ];
    }

    private function resolveMemberStatus(Licence $licence): string
    {
        $expiryDate = $licence->getExpiryDate();

        if ($expiryDate && $expiryDate < new \DateTimeImmutable('today')) {
            return 'Expirée';
        }

        if ($licence->getUser() !== null) {
            return 'Active';
        }

        return 'Non associée';
    }

    private function resolvePaymentStatus(Licence $licence): string
    {
        $expiryDate = $licence->getExpiryDate();

        if ($expiryDate && $expiryDate < new \DateTimeImmutable('today')) {
            return 'Expiré';
        }

        if ($licence->getMembershipPlan() !== null) {
            return 'Payé';
        }

        return 'En attente';
    }

    private function resolvePaymentAmount(Licence $licence): float
    {
        $plan = $licence->getMembershipPlan();

        if (!$plan) {
            return 0.0;
        }

        foreach (['getPrice', 'getAmount', 'getTarif', 'getCost'] as $method) {
            if (method_exists($plan, $method)) {
                return (float) $plan->$method();
            }
        }

        return 0.0;
    }

    private function resolveMembershipPlanName(Licence $licence): ?string
    {
        $plan = $licence->getMembershipPlan();

        if (!$plan) {
            return null;
        }

        foreach (['getName', 'getTitle', 'getLabel'] as $method) {
            if (method_exists($plan, $method)) {
                return (string) $plan->$method();
            }
        }

        return null;
    }
}
