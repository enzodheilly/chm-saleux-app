<?php

namespace App\Command;

use App\Repository\SecurityLogRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:purge-security-logs',
    description: 'Purge les logs de sécurité plus anciens que N jours (défaut : 90 jours)'
)]
class PurgeSecurityLogsCommand extends Command
{
    public function __construct(
        private readonly SecurityLogRepository $securityLogRepository
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption(
            'days',
            'd',
            InputOption::VALUE_OPTIONAL,
            'Nombre de jours de rétention',
            90
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $days = (int) $input->getOption('days');

        $io->title('Purge des logs de sécurité');
        $io->text(sprintf('Suppression des logs de plus de %d jours...', $days));

        $deleted = $this->securityLogRepository->purgeOlderThan($days);

        $io->success(sprintf('%d log(s) supprimé(s).', $deleted));

        return Command::SUCCESS;
    }
}
