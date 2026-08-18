<?php

namespace App\Command;

use App\Repository\LicenceRepository;
use App\Service\QrCodeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * À planifier via cron une fois par jour (ex: `0 4 * * *`, en pleine nuit).
 * Régénère le QR code d'accès de toutes les licences pour limiter la fenêtre
 * d'exploitation d'un QR code volé/partagé (photo, capture d'écran...) à 24h max.
 */
#[AsCommand(
    name: 'app:qrcode:rotate-daily',
    description: 'Régénère automatiquement le QR code de toutes les licences actives (à planifier chaque jour via cron)'
)]
class RotateQrCodesCommand extends Command
{
    public function __construct(
        private readonly LicenceRepository $licenceRepository,
        private readonly QrCodeService $qrCodeService,
        private readonly EntityManagerInterface $em,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $licences = $this->licenceRepository->createQueryBuilder('l')
            ->andWhere('l.expiryDate >= :today')
            ->setParameter('today', new \DateTimeImmutable('today'))
            ->getQuery()
            ->getResult();

        if (empty($licences)) {
            $io->success('Aucune licence active à faire tourner.');
            return Command::SUCCESS;
        }

        foreach ($licences as $licence) {
            $licence->setQrCodeToken($this->qrCodeService->generateToken());
            $licence->setQrCodeUpdatedAt(new \DateTimeImmutable());
        }

        $this->em->flush();

        $io->success(sprintf('%d QR code(s) régénéré(s).', count($licences)));

        return Command::SUCCESS;
    }
}
