<?php

namespace App\Controller\Api;

use App\Entity\Licence;
use App\Repository\LicenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LicenceController extends AbstractController
{
    #[Route('/api/licences/{number}', name: 'api_licence_show', methods: ['GET'])]
    public function show(string $number, LicenceRepository $licenceRepository): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        $licence = $licenceRepository->findOneByNumber($number);

        if (!$licence) {
            return new JsonResponse(['error' => 'Licence introuvable'], 404);
        }

        return new JsonResponse($this->normalizeLicence($licence));
    }

    #[Route('/api/licences/recover', name: 'api_licence_recover', methods: ['POST'])]
    public function recover(Request $request, LicenceRepository $licenceRepository): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Non connecté'], 401);
        }

        $data = json_decode($request->getContent(), true) ?? [];

        $firstName = $data['firstName'] ?? null;
        $lastName = $data['lastName'] ?? null;
        $email = $data['email'] ?? null;

        if (
            (!$firstName || trim($firstName) === '') &&
            (!$lastName || trim($lastName) === '') &&
            (!$email || trim($email) === '')
        ) {
            return new JsonResponse([
                'error' => 'Veuillez renseigner au moins un champ.'
            ], 400);
        }

        $results = $licenceRepository->recoverByIdentity($firstName, $lastName, $email);

        $formatted = array_map(function (Licence $licence) {
            return [
                'licenseNumber' => $licence->getNumber(),
                'firstName' => $licence->getFirstName(),
                'lastName' => $licence->getLastName(),
                'licenseType' => $licence->getType(),
                'expiryDate' => $licence->getExpiryDate()?->format('Y-m-d'),
            ];
        }, $results);

        return new JsonResponse([
            'results' => $formatted,
        ]);
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
            'advantages' => $licence->getBenefits(),
            'alreadyAssociated' => $licence->isAlreadyAssociated(),
            'membershipPlan' => $this->resolveMembershipPlanName($licence),
        ];
    }

    private function resolveMemberStatus(Licence $licence): string
    {
        $expiryDate = $licence->getExpiryDate();

        if ($expiryDate && $expiryDate < new \DateTimeImmutable('today')) {
            return 'Expirée';
        }

        if ($licence->isAlreadyAssociated()) {
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
