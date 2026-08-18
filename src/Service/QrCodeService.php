<?php

namespace App\Service;

use App\Entity\Licence;
use App\Repository\LicenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeService
{
    public function __construct(
        private EntityManagerInterface $em,
        private LicenceRepository $licenceRepository,
    ) {}

    public function generateToken(): string
    {
        do {
            $token = bin2hex(random_bytes(32));
        } while ($this->licenceRepository->findOneBy(['qrCodeToken' => $token]) !== null);

        return $token;
    }

    public function regenerateForLicence(Licence $licence): string
    {
        $token = $this->generateToken();
        $licence->setQrCodeToken($token);
        $licence->setQrCodeUpdatedAt(new \DateTimeImmutable());

        $this->em->flush();

        return $token;
    }

    public function buildQrImageDataUri(string $token): string
    {
        $qrCode = new QrCode(
            data: $token,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 300,
            margin: 10,
        );

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        return $result->getDataUri();
    }
}
