<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Doctrine\EncryptionKeyProvider;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Isole les données réellement sensibles (adresse, téléphone) dans leurs
 * propres tables et les chiffre au repos (AES-256-GCM, voir
 * App\Doctrine\EncryptedStringType) : même en cas de fuite de la seule base
 * de données, ces valeurs restent illisibles sans la clé DATA_ENCRYPTION_KEY,
 * qui ne vit que dans le .env du serveur.
 *
 * ⚠️ IMPORTANT avant de lancer cette migration en production :
 * la variable d'environnement DATA_ENCRYPTION_KEY doit déjà être configurée
 * dans le .env du serveur (générer avec `openssl rand -base64 32`), sinon
 * la migration échoue immédiatement (voir EncryptionKeyProvider). Faire une
 * sauvegarde de la base avant de lancer cette migration, comme pour toute
 * migration qui déplace des données existantes.
 *
 * Note technique : on utilise $this->connection->executeStatement() plutôt
 * que $this->addSql() pour TOUTES les requêtes ici, parce que addSql() ne
 * fait que mettre une requête en file — elle n'est réellement exécutée
 * qu'une fois toute la méthode up()/down() terminée. Comme cette migration
 * a besoin d'exécuter du SQL dans un ordre précis entrelacé avec de la
 * logique PHP (créer les tables, PUIS seulement copier/chiffrer les données
 * dedans, PUIS seulement supprimer les anciennes colonnes), il faut que
 * chaque requête s'exécute immédiatement, dans l'ordre du code.
 */
final class Version20261003130000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Isole adresse/téléphone (demandes de licence) et adresse (licences) dans des tables dédiées chiffrées';
    }

    /**
     * Cette migration contient des CREATE/ALTER TABLE (DDL), qui valident
     * implicitement la transaction en cours sous MySQL — l'envelopper dans
     * une transaction gérée par le framework de migration n'a donc aucun
     * sens (et génère un avertissement de dépréciation à l'exécution).
     */
    public function isTransactional(): bool
    {
        return false;
    }

    public function up(Schema $schema): void
    {
        $this->connection->executeStatement('CREATE TABLE demande_licence_coordonnees (id INT AUTO_INCREMENT NOT NULL, demande_licence_id INT NOT NULL, adresse LONGTEXT DEFAULT NULL, telephone LONGTEXT DEFAULT NULL, responsable_telephone LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_DLC_DEMANDE (demande_licence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->connection->executeStatement('CREATE TABLE licence_coordonnees (id INT AUTO_INCREMENT NOT NULL, licence_id INT NOT NULL, adresse LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_LC_LICENCE (licence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->connection->executeStatement('ALTER TABLE demande_licence_coordonnees ADD CONSTRAINT FK_DLC_DEMANDE FOREIGN KEY (demande_licence_id) REFERENCES demandes_licence (id) ON DELETE CASCADE');
        $this->connection->executeStatement('ALTER TABLE licence_coordonnees ADD CONSTRAINT FK_LC_LICENCE FOREIGN KEY (licence_id) REFERENCES licence (id) ON DELETE CASCADE');

        // --- Migration des données existantes, chiffrées au vol ---
        $rows = $this->connection->fetchAllAssociative(
            'SELECT id, adresse, telephone, responsable_telephone FROM demandes_licence WHERE adresse IS NOT NULL OR telephone IS NOT NULL OR responsable_telephone IS NOT NULL'
        );
        foreach ($rows as $row) {
            $this->connection->insert('demande_licence_coordonnees', [
                'demande_licence_id'    => $row['id'],
                'adresse'               => $row['adresse'] !== null ? EncryptionKeyProvider::encrypt($row['adresse']) : null,
                'telephone'             => $row['telephone'] !== null ? EncryptionKeyProvider::encrypt($row['telephone']) : null,
                'responsable_telephone' => $row['responsable_telephone'] !== null ? EncryptionKeyProvider::encrypt($row['responsable_telephone']) : null,
            ]);
        }

        $licenceRows = $this->connection->fetchAllAssociative('SELECT id, adresse FROM licence WHERE adresse IS NOT NULL');
        foreach ($licenceRows as $row) {
            $this->connection->insert('licence_coordonnees', [
                'licence_id' => $row['id'],
                'adresse'    => EncryptionKeyProvider::encrypt($row['adresse']),
            ]);
        }

        $this->connection->executeStatement('ALTER TABLE demandes_licence DROP adresse, DROP telephone, DROP responsable_telephone');
        $this->connection->executeStatement('ALTER TABLE licence DROP adresse');
    }

    public function down(Schema $schema): void
    {
        $this->connection->executeStatement('ALTER TABLE demandes_licence ADD adresse VARCHAR(255) DEFAULT NULL, ADD telephone VARCHAR(30) DEFAULT NULL, ADD responsable_telephone VARCHAR(30) DEFAULT NULL');
        $this->connection->executeStatement('ALTER TABLE licence ADD adresse VARCHAR(255) DEFAULT NULL');

        $rows = $this->connection->fetchAllAssociative('SELECT demande_licence_id, adresse, telephone, responsable_telephone FROM demande_licence_coordonnees');
        foreach ($rows as $row) {
            $this->connection->update('demandes_licence', [
                'adresse'               => $row['adresse'] !== null ? EncryptionKeyProvider::decrypt($row['adresse']) : null,
                'telephone'             => $row['telephone'] !== null ? EncryptionKeyProvider::decrypt($row['telephone']) : null,
                'responsable_telephone' => $row['responsable_telephone'] !== null ? EncryptionKeyProvider::decrypt($row['responsable_telephone']) : null,
            ], ['id' => $row['demande_licence_id']]);
        }

        $licRows = $this->connection->fetchAllAssociative('SELECT licence_id, adresse FROM licence_coordonnees');
        foreach ($licRows as $row) {
            $this->connection->update(
                'licence',
                ['adresse' => $row['adresse'] !== null ? EncryptionKeyProvider::decrypt($row['adresse']) : null],
                ['id' => $row['licence_id']]
            );
        }

        $this->connection->executeStatement('DROP TABLE demande_licence_coordonnees');
        $this->connection->executeStatement('DROP TABLE licence_coordonnees');
    }
}
