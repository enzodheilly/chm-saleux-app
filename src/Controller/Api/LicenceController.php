<?php

namespace App\Controller\Api;

use App\Entity\Licence;
use App\Entity\User;
use App\Repository\LicenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LicenceController extends AbstractController
{
    #[Route('/api/licences/me', name: 'api_licence_me', methods: ['GET'])]
    public function myLicence(LicenceRepository $licenceRepository): JsonResponse
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return new JsonResponse(['error' => 'Utilisateur non authentifié.'], 401);
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
            return new JsonResponse(['error' => 'Licence introuvable'], 404);
        }

        return new JsonResponse($this->normalizeLicence($licence));
    }

    /**
     * Associe une licence existante (par son numéro) au compte connecté.
     * Équivalent JWT/API de DashboardAdherentController::editLicense (web).
     */
    #[Route('/api/licences/link', name: 'api_licence_link', methods: ['POST'])]
    public function link(Request $request, LicenceRepository $licenceRepository, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return new JsonResponse(['success' => false, 'message' => 'Utilisateur non authentifié.'], 401);
        }

        $data = json_decode($request->getContent(), true) ?? [];
        $number = trim((string) ($data['number'] ?? ''));

        if ($number === '') {
            return new JsonResponse(['success' => false, 'message' => 'Numéro de licence requis.'], 400);
        }

        $licence = $licenceRepository->findOneBy(['number' => $number]);

        if (!$licence) {
            return new JsonResponse(['success' => false, 'message' => 'Numéro de licence invalide.'], 404);
        }

        if ($licence->isAlreadyAssociated() && $licence->getUser() !== $user) {
            return new JsonResponse(['success' => false, 'message' => 'Cette licence est déjà associée à un autre compte.'], 409);
        }

        $licence->setUser($user);
        $em->flush();

        return new JsonResponse([
            'success' => true,
            'license' => $this->normalizeLicence($licence),
        ]);
    }

    /**
     * Dissocie la licence actuelle du compte connecté.
     * Équivalent JWT/API de DashboardAdherentController::removeLicense (web).
     */
    #[Route('/api/licences/unlink', name: 'api_licence_unlink', methods: ['POST'])]
    public function unlink(LicenceRepository $licenceRepository, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return new JsonResponse(['success' => false, 'message' => 'Utilisateur non authentifié.'], 401);
        }

        $licence = $licenceRepository->createQueryBuilder('l')
            ->andWhere('l.user = :user')
            ->setParameter('user', $user)
            ->orderBy('l.expiryDate', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$licence) {
            return new JsonResponse(['success' => false, 'message' => 'Aucune licence associée trouvée.'], 404);
        }

        $licence->setUser(null);
        $em->flush();

        return new JsonResponse(['success' => true]);
    }

    private function normalizeLicence(Licence $licence): array
    {
        return [
            'licenseNumber'  => $licence->getNumber(),
            'firstName'      => $licence->getFirstName(),
            'lastName'       => $licence->getLastName(),
            'email'          => $licence->getEmail(),
            'licenseType'    => $licence->getType(),
            'paymentStatus'  => $this->resolvePaymentStatus($licence),
            'paymentAmount'  => $this->resolvePaymentAmount($licence),
            'expiryDate'     => $licence->getExpiryDate()?->format('Y-m-d'),
            'memberStatus'   => $this->resolveMemberStatus($licence),
            'advantages'     => is_array($licence->getBenefits()) ? $licence->getBenefits() : [],
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

        return $licence->getUser() !== null ? 'Active' : 'Non associée';
    }

    private function resolvePaymentStatus(Licence $licence): string
    {
        $expiryDate = $licence->getExpiryDate();

        if ($expiryDate && $expiryDate < new \DateTimeImmutable('today')) {
            return 'Expiré';
        }

        return $licence->getMembershipPlan() !== null ? 'Payé' : 'En attente';
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
