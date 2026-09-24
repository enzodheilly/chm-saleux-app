<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260922000001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Crée la table seances_essai pour le suivi des séances d\'essai gratuites';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE seances_essai (
            id INT AUTO_INCREMENT NOT NULL,
            nom VARCHAR(100) NOT NULL,
            prenom VARCHAR(100) NOT NULL,
            telephone VARCHAR(20) DEFAULT NULL,
            email VARCHAR(180) DEFAULT NULL,
            date_seance DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\',
            converti_en_adherent TINYINT(1) NOT NULL DEFAULT 0,
            notes LONGTEXT DEFAULT NULL,
            created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE seances_essai');
    }
}
