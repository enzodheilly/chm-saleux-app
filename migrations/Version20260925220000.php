<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260925220000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Crée la table demandes_licence (formulaire public de demande de licence en ligne)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE demandes_licence (
            id INT AUTO_INCREMENT NOT NULL,
            formule VARCHAR(20) NOT NULL,
            tarif_reduit TINYINT(1) NOT NULL,
            justificatif_reduit_path VARCHAR(255) DEFAULT NULL,
            foyer_rang SMALLINT NOT NULL,
            nom VARCHAR(100) NOT NULL,
            prenom VARCHAR(100) NOT NULL,
            sexe VARCHAR(1) DEFAULT NULL,
            date_naissance DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\',
            adresse VARCHAR(255) DEFAULT NULL,
            telephone VARCHAR(30) DEFAULT NULL,
            email VARCHAR(180) NOT NULL,
            responsable_nom VARCHAR(150) DEFAULT NULL,
            responsable_lien VARCHAR(100) DEFAULT NULL,
            responsable_telephone VARCHAR(30) DEFAULT NULL,
            responsable_email VARCHAR(180) DEFAULT NULL,
            certificat_medical_path VARCHAR(255) NOT NULL,
            montant_calcule NUMERIC(7, 2) NOT NULL,
            mode_paiement VARCHAR(20) NOT NULL,
            statut_paiement VARCHAR(20) NOT NULL,
            statut_ffhm VARCHAR(20) NOT NULL,
            notes_admin LONGTEXT DEFAULT NULL,
            created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE demandes_licence');
    }
}
