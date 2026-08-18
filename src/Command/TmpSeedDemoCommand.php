<?php

namespace App\Command;

use App\Entity\CheckIn;
use App\Entity\Licence;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:tmp:seed-demo')]
class TmpSeedDemoCommand extends Command
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $today = new \DateTimeImmutable('today');
        $licences = [];

        // 10 licences fictives, chacune avec un scan IN (= 10 adhérents "en direct").
        for ($i = 1; $i <= 10; $i++) {
            $licence = new Licence();
            $licence->setType('Loisir & Muscu');
            $licence->setNumber('TMPDEMO' . $i);
            $licence->setExpiryDate(new \DateTimeImmutable('+6 months'));
            $licence->setFirstName('Demo');
            $licence->setLastName('Adherent ' . $i);
            $licence->setEmail("tmp-demo-$i@example.test");
            $this->em->persist($licence);
            $licences[] = $licence;
        }
        $this->em->flush(); // pour obtenir les id avant de créer les check-ins

        // Répartition par heure (matin 10h-12h, soir 16h-20h) pour les bougies.
        $slots = [
            ['h' => 10, 'm' => 15], ['h' => 10, 'm' => 45],
            ['h' => 11, 'm' => 20],
            ['h' => 16, 'm' => 10],
            ['h' => 17, 'm' => 30], ['h' => 17, 'm' => 45],
            ['h' => 18, 'm' => 20],
            ['h' => 19, 'm' => 5], ['h' => 19, 'm' => 40],
        ];
        foreach ($slots as $i => $slot) {
            $checkIn = new CheckIn();
            $checkIn->setLicence($licences[$i % count($licences)]);
            $checkIn->setType(CheckIn::TYPE_IN);
            $checkIn->setSource('tmp_seed_demo');
            $checkIn->setScannedAt($today->setTime($slot['h'], $slot['m']));
            $this->em->persist($checkIn);
        }

        // Un scan IN "maintenant" pour chacune des 10 licences (= compteur en direct = 10).
        $now = new \DateTimeImmutable();
        foreach ($licences as $licence) {
            $checkIn = new CheckIn();
            $checkIn->setLicence($licence);
            $checkIn->setType(CheckIn::TYPE_IN);
            $checkIn->setSource('tmp_seed_demo');
            $checkIn->setScannedAt($now);
            $this->em->persist($checkIn);
        }

        $this->em->flush();
        $output->writeln('Seeded 10 fake licences + check-ins for demo.');

        return Command::SUCCESS;
    }
}
