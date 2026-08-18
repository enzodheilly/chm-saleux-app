<?php

namespace App\Service;

use App\Entity\CheckIn;
use App\Entity\Licence;
use App\Repository\CheckInRepository;
use App\Repository\LicenceRepository;
use Doctrine\ORM\EntityManagerInterface;

class CheckInService
{
    public function __construct(
        private EntityManagerInterface $em,
        private LicenceRepository $licenceRepository,
        private CheckInRepository $checkInRepository,
    ) {}

    /**
     * Traite un scan de QR code à l'entrée de la salle : bascule l'adhérent en entrée ou en sortie
     * selon son dernier passage du jour, et journalise le passage.
     *
     * @return array{licence: Licence, type: string, checkIn: CheckIn}|null null si le token ne correspond à aucune licence
     */
    public function handleScan(string $token, ?string $source = null): ?array
    {
        $token = trim($token);
        if ($token === '') {
            return null;
        }

        $licence = $this->licenceRepository->findOneBy(['qrCodeToken' => $token]);
        if (!$licence instanceof Licence) {
            return null;
        }

        $lastToday = $this->checkInRepository->findLastForLicenceToday($licence);
        $type = ($lastToday && $lastToday->getType() === CheckIn::TYPE_IN)
            ? CheckIn::TYPE_OUT
            : CheckIn::TYPE_IN;

        $checkIn = new CheckIn();
        $checkIn->setLicence($licence);
        $checkIn->setType($type);
        $checkIn->setSource($source);

        $this->em->persist($checkIn);
        $this->em->flush();

        return [
            'licence' => $licence,
            'type' => $type,
            'checkIn' => $checkIn,
        ];
    }
}
