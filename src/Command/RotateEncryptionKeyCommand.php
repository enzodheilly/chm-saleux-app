<?php

namespace App\Command;

use App\Doctrine\EncryptionKeyProvider;
use App\Service\SystemLoggerService;
use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Rotation de la clé de chiffrement des données sensibles (DATA_ENCRYPTION_KEY) :
 * déchiffre toutes les colonnes chiffrées (adresse, téléphone...) avec la clé
 * actuellement configurée, puis les rechiffre avec une nouvelle clé fournie
 * en argument. Utile en cas de compromission suspectée de la clé actuelle,
 * ou simplement comme bonne pratique de rotation périodique.
 *
 * Fonctionne entièrement en SQL brut (pas via les entités Doctrine), parce
 * que EncryptedStringType ne connaît qu'une seule clé à la fois (le
 * détenteur statique EncryptionKeyProvider) — impossible de lui faire
 * déchiffrer avec l'ancienne et rechiffrer avec la nouvelle dans la même
 * requête. Voir EncryptionKeyProvider::encryptWithKey()/decryptWithKey(),
 * qui prennent une clé explicite plutôt que la clé globale.
 *
 * Usage :
 *   php bin/console app:rotate-encryption-key "NOUVELLE_CLE_BASE64" --dry-run   (vérifie, n'écrit rien)
 *   php bin/console app:rotate-encryption-key "NOUVELLE_CLE_BASE64"              (rotation réelle)
 *
 * La clé ACTUELLE doit être celle déjà configurée dans DATA_ENCRYPTION_KEY
 * (.env) au moment de lancer cette commande — c'est elle qui sert à
 * déchiffrer les valeurs existantes. Une fois la commande terminée avec
 * succès, il faut mettre à jour DATA_ENCRYPTION_KEY dans le .env avec la
 * NOUVELLE clé, puis vider le cache — voir le message affiché en fin de
 * commande.
 */
#[AsCommand(name: 'app:rotate-encryption-key', description: 'Rechiffre les données sensibles (adresse, téléphone) avec une nouvelle clé')]
class RotateEncryptionKeyCommand extends Command
{
    /**
     * Une entrée par table "coordonnées" : [table, colonne d'id, colonnes chiffrées].
     */
    private const TABLES = [
        ['demande_licence_coordonnees', 'id', ['adresse', 'telephone', 'responsable_telephone']],
        ['licence_coordonnees', 'id', ['adresse']],
        ['seance_essai_coordonnees', 'id', ['adresse', 'telephone', 'responsable_telephone']],
    ];

    public function __construct(
        private readonly Connection $connection,
        private readonly SystemLoggerService $logger,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('new-key', InputArgument::REQUIRED, 'Nouvelle clé de chiffrement (base64, 32 octets — générer avec "openssl rand -base64 32")')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'Vérifie que tout peut être déchiffré/rechiffré sans rien écrire en base');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $dryRun = (bool) $input->getOption('dry-run');

        $oldKeyBase64 = (string) ($_ENV['DATA_ENCRYPTION_KEY'] ?? $_SERVER['DATA_ENCRYPTION_KEY'] ?? '');
        if ($oldKeyBase64 === '') {
            $io->error('DATA_ENCRYPTION_KEY n\'est pas configurée : c\'est la clé ACTUELLE qui doit être présente dans le .env pour que cette commande puisse déchiffrer les données existantes.');
            return Command::FAILURE;
        }

        try {
            $oldKey = EncryptionKeyProvider::decodeKey($oldKeyBase64);
            $newKey = EncryptionKeyProvider::decodeKey((string) $input->getArgument('new-key'));
        } catch (\RuntimeException $e) {
            $io->error($e->getMessage());
            return Command::FAILURE;
        }

        if ($oldKey === $newKey) {
            $io->error('La nouvelle clé est identique à l\'actuelle — rien à faire.');
            return Command::FAILURE;
        }

        $io->section($dryRun ? 'Vérification (dry-run, aucune écriture)' : 'Rotation de la clé de chiffrement');

        // --- Étape 1 : tout déchiffrer avec l'ancienne clé, en mémoire, sans rien écrire ---
        // Si une seule valeur ne se déchiffre pas correctement (mauvaise clé,
        // donnée corrompue), on arrête AVANT d'écrire quoi que ce soit : mieux
        // vaut échouer proprement que de rechiffrer une donnée déjà perdue
        // sous une clé différente, ce qui la perdrait définitivement.
        $plan = [];
        $total = 0;
        foreach (self::TABLES as [$table, $idColumn, $columns]) {
            $rows = $this->connection->fetchAllAssociative(
                sprintf('SELECT %s, %s FROM %s', $idColumn, implode(', ', $columns), $table)
            );

            foreach ($rows as $row) {
                $newValues = [];
                foreach ($columns as $column) {
                    if ($row[$column] === null) {
                        continue;
                    }

                    $plaintext = EncryptionKeyProvider::decryptWithKey($row[$column], $oldKey);
                    if ($plaintext === null) {
                        $io->error(sprintf(
                            'Échec de déchiffrement sur %s.%s (id=%s) avec la clé actuelle — arrêt sans aucune écriture. Vérifie que DATA_ENCRYPTION_KEY correspond bien à la clé utilisée jusqu\'ici.',
                            $table,
                            $column,
                            $row[$idColumn]
                        ));
                        return Command::FAILURE;
                    }

                    $newValues[$column] = EncryptionKeyProvider::encryptWithKey($plaintext, $newKey);
                    $total++;
                }

                if ($newValues !== []) {
                    $plan[] = [$table, $idColumn, $row[$idColumn], $newValues];
                }
            }
        }

        $io->writeln(sprintf('%d valeur(s) sur %d ligne(s) prête(s) à être rechiffrée(s).', $total, count($plan)));

        if ($dryRun) {
            $io->success('Vérification OK : toutes les valeurs se déchiffrent correctement avec la clé actuelle. Relance sans --dry-run pour effectuer la rotation.');
            return Command::SUCCESS;
        }

        // --- Étape 2 : tout écrire dans une seule transaction (tout ou rien) ---
        $this->connection->beginTransaction();
        try {
            foreach ($plan as [$table, $idColumn, $id, $newValues]) {
                $this->connection->update($table, $newValues, [$idColumn => $id]);
            }
            $this->connection->commit();
        } catch (\Throwable $e) {
            $this->connection->rollBack();
            $io->error('Échec pendant l\'écriture, tout a été annulé (rollback) : ' . $e->getMessage());
            return Command::FAILURE;
        }

        $this->logger->add(
            SystemLoggerService::TYPE_ADMIN,
            sprintf('Rotation de la clé de chiffrement des données sensibles : %d valeur(s) rechiffrée(s) sur %d ligne(s).', $total, count($plan))
        );

        $io->success(sprintf('%d valeur(s) rechiffrée(s) avec succès.', $total));
        $io->warning([
            'Dernière étape (manuelle, pas faite par cette commande) :',
            '1. Remplacer DATA_ENCRYPTION_KEY dans le .env par la nouvelle clé.',
            '2. php bin/console cache:clear --env=prod',
            '3. Ranger l\'ancienne clé en sécurité (ou la détruire) une fois le nouveau .env confirmé fonctionnel.',
        ]);

        return Command::SUCCESS;
    }
}
