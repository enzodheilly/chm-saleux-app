<?php

namespace App\Controller\Api;

use App\Entity\Licence;
use App\Entity\User;
use App\Repository\CheckInRepository;
use App\Repository\LicenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class QrCodeController extends AbstractController
{
    #[Route('/api/qrcode/me', name: 'api_qrcode_me', methods: ['GET'])]
    public function myQrCode(LicenceRepository $licenceRepository): JsonResponse
    {
        $user = $this->currentUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Utilisateur non authentifié.'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $licence = $this->resolveLicence($licenceRepository, $user);

        return new JsonResponse([
            'token' => $licence?->getQrCodeToken(),
            'updatedAt' => $licence?->getQrCodeUpdatedAt()?->format('c'),
        ]);
    }

    /**
     * Sondé par l'app mobile pendant l'affichage plein écran du QR : permet de détecter
     * qu'un scan vient d'avoir lieu (staff à l'accueil) pour afficher une confirmation
     * "Bon entraînement !" à la place du QR, sans action manuelle de l'adhérent.
     */
    #[Route('/api/qrcode/me/status', name: 'api_qrcode_me_status', methods: ['GET'])]
    public function myScanStatus(LicenceRepository $licenceRepository, CheckInRepository $checkInRepository): JsonResponse
    {
        $user = $this->currentUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Utilisateur non authentifié.'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $licence = $this->resolveLicence($licenceRepository, $user);
        if (!$licence) {
            return new JsonResponse(['scannedAt' => null, 'type' => null]);
        }

        $lastCheckIn = $checkInRepository->findLastForLicenceToday($licence);

        return new JsonResponse([
            'scannedAt' => $lastCheckIn?->getScannedAt()->format('c'),
            'type' => $lastCheckIn?->getType(),
            'firstName' => $licence->getFirstName(),
        ]);
    }

    private function currentUser(): ?User
    {
        $user = $this->getUser();
        return $user instanceof User ? $user : null;
    }

    private function resolveLicence(LicenceRepository $licenceRepository, User $user): ?Licence
    {
        return $licenceRepository->createQueryBuilder('l')
            ->andWhere('l.user = :user')
            ->setParameter('user', $user)
            ->orderBy('l.expiryDate', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
