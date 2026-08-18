<?php

namespace App\Command;

use App\Entity\Licence;
use App\Repository\LicenceRepository;
use App\Service\QrCodeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:qrcode:backfill',
    description: 'Attribue un QR code aux licences existantes qui n\'en ont pas encore (créées avant cette fonctionnalité)'
)]
class BackfillMemberQrCodesCommand extends Command
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

        /** @var Licence[] $licences */
        $licences = $this->licenceRepository->findBy(['qrCodeToken' => null]);

        if (empty($licences)) {
            $io->success('Toutes les licences ont déjà un QR code.');
            return Command::SUCCESS;
        }

        $io->title('Attribution des QR codes manquants');

        foreach ($licences as $licence) {
            $token = $this->qrCodeService->generateToken();
            $licence->setQrCodeToken($token);
            $licence->setQrCodeUpdatedAt(new \DateTimeImmutable());
        }

        $this->em->flush();

        $io->success(sprintf('%d licence(s) mise(s) à jour avec un nouveau QR code.', count($licences)));

        return Command::SUCCESS;
    }
}
