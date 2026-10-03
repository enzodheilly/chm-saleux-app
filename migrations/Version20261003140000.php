<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Doctrine\EncryptionKeyProvider;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Même traitement que Version20261003130000 (demandes de licence / licences),
 * appliqué à seances_essai : isole adresse/téléphone/téléphone du responsable
 * dans une table dédiée chiffrée au repos.
 *
 * ⚠️ DATA_ENCRYPTION_KEY doit déjà être configurée dans le .env du serveur
 * avant de lancer cette migration (voir Version20261003130000 pour le détail
 * et faire une sauvegarde de la base avant de migrer).
 *
 * Toutes les requêtes utilisent $this->connection->executeStatement()
 * (jamais $this->addSql(), qui ne s'exécuterait qu'après la fin de up(),
 * trop tard pour l'ordre create -> copier/chiffrer -> drop dont on a besoin
 * ici — c'est le bug corrigé sur la migration précédente).
 */
final class Version20261003140000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Isole adresse/téléphone/téléphone responsable (séances d\'essai) dans une table dédiée chiffrée';
    }

    /** Voir Version20261003130000::isTransactional() pour le pourquoi. */
    public function isTransactional(): bool
    {
        return false;
    }

    public function up(Schema $schema): void
    {
        $this->connection->executeStatement('CREATE TABLE seance_essai_coordonnees (id INT AUTO_INCREMENT NOT NULL, seance_essai_id INT NOT NULL, adresse LONGTEXT DEFAULT NULL, telephone LONGTEXT DEFAULT NULL, responsable_telephone LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_SEC_SEANCE (seance_essai_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->connection->executeStatement('ALTER TABLE seance_essai_coordonnees ADD CONSTRAINT FK_SEC_SEANCE FOREIGN KEY (seance_essai_id) REFERENCES seances_essai (id) ON DELETE CASCADE');

        $rows = $this->connection->fetchAllAssociative(
            'SELECT id, adresse, telephone, responsable_telephone FROM seances_essai WHERE adresse IS NOT NULL OR telephone IS NOT NULL OR responsable_telephone IS NOT NULL'
        );
        foreach ($rows as $row) {
            $this->connection->insert('seance_essai_coordonnees', [
                'seance_essai_id'       => $row['id'],
                'adresse'               => $row['adresse'] !== null ? EncryptionKeyProvider::encrypt($row['adresse']) : null,
                'telephone'             => $row['telephone'] !== null ? EncryptionKeyProvider::encrypt($row['telephone']) : null,
                'responsable_telephone' => $row['responsable_telephone'] !== null ? EncryptionKeyProvider::encrypt($row['responsable_telephone']) : null,
            ]);
        }

        $this->connection->executeStatement('ALTER TABLE seances_essai DROP adresse, DROP telephone, DROP responsable_telephone');
    }

    public function down(Schema $schema): void
    {
        $this->connection->executeStatement('ALTER TABLE seances_essai ADD adresse VARCHAR(255) DEFAULT NULL, ADD telephone VARCHAR(30) DEFAULT NULL, ADD responsable_telephone VARCHAR(30) DEFAULT NULL');

        $rows = $this->connection->fetchAllAssociative('SELECT seance_essai_id, adresse, telephone, responsable_telephone FROM seance_essai_coordonnees');
        foreach ($rows as $row) {
            $this->connection->update('seances_essai', [
                'adresse'               => $row['adresse'] !== null ? EncryptionKeyProvider::decrypt($row['adresse']) : null,
                'telephone'             => $row['telephone'] !== null ? EncryptionKeyProvider::decrypt($row['telephone']) : null,
                'responsable_telephone' => $row['responsable_telephone'] !== null ? EncryptionKeyProvider::decrypt($row['responsable_telephone']) : null,
            ], ['id' => $row['seance_essai_id']]);
        }

        $this->connection->executeStatement('DROP TABLE seance_essai_coordonnees');
    }
}
