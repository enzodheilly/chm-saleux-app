<?php

namespace App\Command;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:purge-deleted-accounts',
    description: 'Supprime physiquement les comptes désactivés dont le délai de conservation de 3 mois est dépassé'
)]
class PurgeDeletedAccountsCommand extends Command
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $em
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Purge des comptes désactivés');

        $now = new \DateTimeImmutable();
        $users = $this->userRepository->findAccountsDueForPurge($now);

        if (empty($users)) {
            $io->success('Aucun compte à purger.');
            return Command::SUCCESS;
        }

        $io->text(sprintf('%d compte(s) à supprimer définitivement...', count($users)));

        $deleted = 0;
        foreach ($users as $user) {
            $io->text(sprintf('  → Suppression : %s (prévu le %s)', $user->getEmail(), $user->getScheduledPurgeAt()?->format('Y-m-d')));
            $this->em->remove($user);
            $deleted++;
        }

        $this->em->flush();

        $io->success(sprintf('%d compte(s) supprimé(s) définitivement.', $deleted));

        return Command::SUCCESS;
    }
}
