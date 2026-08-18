<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260713203405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute les mensurations (taille, poids, âge) sur User, éditables par l\'adhérent lui-même.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD height_cm INT DEFAULT NULL, ADD weight_kg INT DEFAULT NULL, ADD age INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP height_cm, DROP weight_kg, DROP age');
    }
}
