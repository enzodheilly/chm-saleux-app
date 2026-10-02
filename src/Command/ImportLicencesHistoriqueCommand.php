<?php

namespace App\Command;

use App\Entity\Licence;
use App\Repository\LicenceRepository;
use App\Service\LicenceTarifService;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Import ponctuel de l'historique des adhérents 2020-2026 (fichier fourni par
 * le président), une seule ligne par personne (saison la plus récente connue).
 *
 * Le CSV n'est volontairement PAS versionné dans le dépôt (dépôt public, et ce
 * fichier contient des données personnelles réelles) : il doit être déposé à la
 * main sur le serveur, en dehors de Git — voir var/import/ (déjà ignoré par
 * .gitignore) — puis supprimé une fois l'import terminé.
 *
 * Idempotent : si une licence existe déjà avec le même (nom, prénom, numéro),
 * la ligne est ignorée plutôt que dupliquée — on peut relancer la commande sans
 * risque si elle a été interrompue.
 *
 * Colonnes attendues : nom,prenom,email,adresse,numero,formule,saison_fin_annee,numero_est_placeholder,benefit_note
 */
#[AsCommand(name: 'app:import-licences-historique', description: 'Importe l\'historique des licences depuis un CSV ponctuel (voir commentaire de la classe)')]
class ImportLicencesHistoriqueCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly LicenceRepository $licenceRepository,
        private readonly LicenceTarifService $tarifService,
        private readonly SystemLoggerService $logger,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('csv', InputArgument::REQUIRED, 'Chemin vers le fichier CSV à importer');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $path = (string) $input->getArgument('csv');

        if (!is_file($path) || !is_readable($path)) {
            $io->error('Fichier introuvable ou illisible : ' . $path);
            return Command::FAILURE;
        }

        $handle = fopen($path, 'r');
        if ($handle === false) {
            $io->error('Impossible d\'ouvrir le fichier.');
            return Command::FAILURE;
        }

        $header = fgetcsv($handle);
        if ($header === false) {
            $io->error('CSV vide.');
            return Command::FAILURE;
        }

        $formules = $this->tarifService->getFormules();

        $created = 0;
        $skippedExisting = 0;
        $skippedInvalid = 0;
        $line = 1;

        while (($row = fgetcsv($handle)) !== false) {
            $line++;
            if (count($row) < count($header)) {
                $skippedInvalid++;
                continue;
            }
            $data = array_combine($header, $row);

            $nom = trim((string) ($data['nom'] ?? ''));
            $prenom = trim((string) ($data['prenom'] ?? ''));
            $numero = trim((string) ($data['numero'] ?? ''));
            $saisonFinAnnee = (int) ($data['saison_fin_annee'] ?? 0);

            if ($nom === '' || $prenom === '' || $numero === '' || $saisonFinAnnee < 2000) {
                $skippedInvalid++;
                continue;
            }

            // Idempotence : déjà importé ?
            $existing = $this->licenceRepository->findOneByNumber($numero);
            if ($existing !== null) {
                $skippedExisting++;
                continue;
            }

            $email = trim((string) ($data['email'] ?? ''));
            $adresse = trim((string) ($data['adresse'] ?? ''));
            $formuleCode = trim((string) ($data['formule'] ?? 'loisir'));
            $benefitNote = trim((string) ($data['benefit_note'] ?? ''));

            $licence = new Licence();
            $licence->setType($formules[$formuleCode] ?? $formules[LicenceTarifService::FORMULE_LOISIR]);
            $licence->setNumber($numero);
            $licence->setFirstName($prenom);
            $licence->setLastName($nom);
            $licence->setEmail($email !== '' ? $email : null);
            $licence->setAdresse($adresse !== '' ? $adresse : null);
            $licence->setExpiryDate(new \DateTimeImmutable(sprintf('%d-08-31 23:59:59', $saisonFinAnnee)));
            $licence->setActivee(true);
            $licence->setBenefits($benefitNote !== '' ? [$benefitNote] : []);

            $this->em->persist($licence);
            $created++;

            // Flush par lot pour limiter la mémoire sur un gros import.
            if ($created % 50 === 0) {
                $this->em->flush();
            }
        }
        fclose($handle);
        $this->em->flush();

        $this->logger->add(
            SystemLoggerService::TYPE_ADMIN,
            sprintf('Import historique des licences : %d créées, %d déjà présentes (ignorées), %d lignes invalides', $created, $skippedExisting, $skippedInvalid)
        );

        $io->success(sprintf(
            '%d licence(s) créée(s). %d déjà présentes (ignorées). %d ligne(s) invalide(s) ignorée(s).',
            $created,
            $skippedExisting,
            $skippedInvalid
        ));

        return Command::SUCCESS;
    }
}
