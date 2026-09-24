<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Enrichit seances_essai avec les champs complets du formulaire de séance découverte
 * (coordonnées, responsable légal, lieu/date de signature) pour fusionner l'ancien
 * doublon "discovery_session" dans le système existant.
 */
final class Version20260924180000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute les champs coordonnées / responsable légal / signature à seances_essai';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE seances_essai
            ADD sexe VARCHAR(1) DEFAULT NULL,
            ADD date_naissance DATE DEFAULT NULL,
            ADD adresse VARCHAR(255) DEFAULT NULL,
            ADD telephone VARCHAR(30) DEFAULT NULL,
            ADD email VARCHAR(180) DEFAULT NULL,
            ADD responsable_nom VARCHAR(150) DEFAULT NULL,
            ADD responsable_lien VARCHAR(100) DEFAULT NULL,
            ADD responsable_telephone VARCHAR(30) DEFAULT NULL,
            ADD responsable_email VARCHAR(180) DEFAULT NULL,
            ADD lieu_signature VARCHAR(100) DEFAULT \'Saleux\',
            ADD date_signature DATE DEFAULT NULL
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE seances_essai
            DROP sexe,
            DROP date_naissance,
            DROP adresse,
            DROP telephone,
            DROP email,
            DROP responsable_nom,
            DROP responsable_lien,
            DROP responsable_telephone,
            DROP responsable_email,
            DROP lieu_signature,
            DROP date_signature
        ');
    }
}
