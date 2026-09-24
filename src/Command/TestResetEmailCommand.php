<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

#[AsCommand(
    name: 'app:test-reset-email',
    description: '[TEST] Envoie le vrai template "réinitialisation de mot de passe" vers une adresse donnée'
)]
class TestResetEmailCommand extends Command
{
    public function __construct(
        private readonly MailerInterface $mailer,
        private readonly Environment $twig,
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Adresse de destination')
            ->addOption('transport', null, \Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'Transport à utiliser (ex: support). Sans cette option, le transport main est utilisé.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $to = (string) $input->getArgument('email');

        // Fake user object pour le template (pas de persistance, pas de token réel)
        $fakeUser = new class {
            public function getFirstName(): string { return 'Test'; }
            public function getLastName(): string  { return 'Utilisateur'; }
            public function getEmail(): string     { return ''; }
        };

        $fakeResetUrl = $this->urlGenerator->generate(
            'app_reset_password_confirm',
            ['token' => 'TEST-TOKEN-NON-FONCTIONNEL'],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        $html = $this->twig->render('emails/reset_password.html.twig', [
            'user'     => $fakeUser,
            'resetUrl' => $fakeResetUrl,
        ]);

        $email = (new Email())
            ->from('no-reply@chm-saleux.fr')
            ->to($to)
            ->subject('[TEST] Réinitialisation de votre mot de passe — CHM Saleux')
            ->html($html);

        $transport = $input->getOption('transport');
        if ($transport !== null) {
            $email->getHeaders()->addTextHeader('X-Transport', $transport);
        }

        $this->mailer->send($email);

        $io->success(sprintf('Email envoyé vers %s via le transport %s.', $to, $transport ?? 'main'));
        $io->note('Le lien de réinitialisation dans le mail est factice (token TEST-TOKEN-NON-FONCTIONNEL) — il ne fonctionne pas.');

        return Command::SUCCESS;
    }
}
